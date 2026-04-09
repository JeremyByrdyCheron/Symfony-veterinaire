<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        if (!$user || $user->getStatus() !== User::STATUS_APPROVED) {
            return $this->redirectToRoute('app_pending');
        }
        ;
        return $this->render('profile/index.html.twig', ['user' => $user]);
    }
    #[Route('/profile/edit', name: 'profile-edit')]
    public function edit(Request $request, EntityManagerInterface $em): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();
        if (!$user || $user->getStatus() !== User::STATUS_APPROVED) {
            return $this->redirectToRoute('app_pending');
        }
        ;
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            return $this->redirectToRoute('profile');
        }

        return $this->render('profile/edit.html.twig', ['form' => $form]);

    }
    #[Route('/profile/delete', name: 'profile-delete', methods: ['POST'])]
    public function delete(
        Request $request,
        EntityManagerInterface $em,
    ): Response {
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        if (!$user || $user->getStatus() !== User::STATUS_APPROVED) {
            return $this->redirectToRoute('app_pending');
        }

        if ($this->isCsrfTokenValid('delete_account', $request->request->get('_token'))) {

            $request->getSession()->invalidate();
            $em->remove($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        $this->addFlash('error', 'Action non autorisée');
        return $this->redirectToRoute('profile');
    }








}
