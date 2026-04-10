<?php

namespace App\Controller;

use App\Entity\AnimalFolder;
use App\Form\AnimalFolderType;
use App\Repository\AnimalFolderRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/animal-folder')]
final class AnimalFolderController extends AbstractController
{
    #[Route(name: 'app_animal_folder_index', methods: ['GET'])]
    public function index(AnimalFolderRepository $animalFolderRepository): Response
    {
        return $this->render('animal_folder/index.html.twig', [
            'animal_folders' => $animalFolderRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_animal_folder_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $animalFolder = new AnimalFolder();
        $form = $this->createForm(AnimalFolderType::class, $animalFolder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($animalFolder);
            $entityManager->flush();

            return $this->redirectToRoute('app_animal_folder_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animal_folder/new.html.twig', [
            'animal_folder' => $animalFolder,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_folder_show', methods: ['GET'])]
    public function show(AnimalFolder $animalFolder): Response
    {
        return $this->render('animal_folder/show.html.twig', [
            'animal_folder' => $animalFolder,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_animal_folder_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AnimalFolder $animalFolder, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnimalFolderType::class, $animalFolder);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_animal_folder_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('animal_folder/edit.html.twig', [
            'animal_folder' => $animalFolder,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_folder_delete', methods: ['POST'])]
    public function delete(Request $request, AnimalFolder $animalFolder, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $animalFolder->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($animalFolder);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_animal_folder_index', [], Response::HTTP_SEE_OTHER);
    }
}
