<?php

namespace App\Controller;

use App\Entity\Request;
use App\Enum\Status;
use App\Repository\RequestRepository;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request as HttpRequest;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/veterinaire/notifications')]
class NotificationController extends AbstractController
{
    #[Route('', name: 'app_notifications')]
    public function index(RequestRepository $requestRepository): Response
    {
        $requests = $requestRepository->findBy(['status' => Status::PENDING]);

        return $this->render('notifications/index.html.twig', [
            'requests' => $requests,
        ]);
    }

    #[Route('/{id}/accept', name: 'app_notification_accept', methods: ['POST'])]
    public function accept(
        Request $request,
        EntityManagerInterface $em,
        MailService $mailService
    ): Response {
        $request->setStatus(Status::ACCEPTED);
        $em->flush();
        $mailService->sendRequestStatusMail($request);
        $this->addFlash('success', 'Rendez-vous accepté, le client a été notifié.');

        return $this->redirectToRoute('app_notifications');
    }

    #[Route('/{id}/refuse', name: 'app_notification_refuse', methods: ['POST'])]
    public function refuse(
        Request $request,
        EntityManagerInterface $em,
        MailService $mailService
    ): Response {
        $request->setStatus(Status::REFUSED);
        $em->flush();
        $mailService->sendRequestStatusMail($request);
        $this->addFlash('success', 'Rendez-vous refusé, le client a été notifié.');

        return $this->redirectToRoute('app_notifications');
    }

    #[Route('/{id}/reschedule', name: 'app_notification_reschedule', methods: ['POST'])]
    public function reschedule(
        Request $request,
        HttpRequest $httpRequest,
        EntityManagerInterface $em,
        MailService $mailService
    ): Response {
        $newDateStr = $httpRequest->request->get('new_date');
        $newDate = $newDateStr ? new \DateTime($newDateStr) : null;

        $request->setStatus(Status::RESCHEDULED);
        $em->flush();
        $mailService->sendRequestStatusMail($request, $newDate);
        $this->addFlash('success', 'Nouveau créneau proposé, le client a été notifié.');

        return $this->redirectToRoute('app_notifications');
    }
}
