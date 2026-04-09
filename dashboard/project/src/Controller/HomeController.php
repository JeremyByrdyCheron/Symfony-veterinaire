<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\AppointmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(AppointmentRepository $appointmentRepository): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        if (!$user || $user->getStatus() !== User::STATUS_APPROVED) {
            return $this->redirectToRoute('app_pending');
        }

        $appointments = $appointmentRepository->findBy([
            'veterinaryId' => $user->getId()
        ]);


        return $this->render('home/index.html.twig', [
            'user' => $user,
            'appointments' => $appointments
        ]);
    }
}
