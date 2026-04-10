<?php

namespace App\Controller;

use App\Entity\User;
use App\Enum\Status;
use App\Repository\AppointmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CalendarController extends AbstractController
{
    #[Route('/veterinaire/calendar', name: 'app_calendar')]
    public function index(AppointmentRepository $appointmentRepository): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        $appointments = $appointmentRepository->findBy([
            'veterinaryId' => $user,
            'status' => Status::ACCEPTED,
        ]);

        $events = [];
        foreach ($appointments as $appointment) {
            $events[] = [
                'title' => $appointment->getFirstname() . ' ' . $appointment->getLastname() . ' — ' . $appointment->getAnimal(),
                'start' => $appointment->getWantedDate()->format('Y-m-d'),
                'description' => $appointment->getDescription(),
            ];
        }

        return $this->render('calendar/index.html.twig', [
            'events' => json_encode($events),
        ]);
    }
}
