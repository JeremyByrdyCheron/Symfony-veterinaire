<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\DocumentType;
use App\Repository\DocumentRepository;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/document')]
final class DocumentController extends AbstractController
{
    #[Route(name: 'app_document_index', methods: ['GET'])]
    public function index(DocumentRepository $documentRepository): Response
    {
        return $this->render('document/index.html.twig', [
            'documents' => $documentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_document_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
        MailService $mailService
    ): Response {
        $document = new Document();
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $appointment = $document->getAppointmentId();
            $animal = $document->getAnimalId();

            if ($appointment && $animal && $appointment->getAnimalFolderId()?->getId() !== $animal->getId()) {
                $this->addFlash('error', "L'animal sélectionné ne correspond pas au rendez-vous.");
            } else {
                $document->setOwnerEmail($appointment?->getEmail());
                $entityManager->persist($document);
                $entityManager->flush();
                $mailService->sendDocumentMail($document);
                $this->addFlash('success', 'Document créé et mail envoyé au client !');
                return $this->redirectToRoute('app_document_index', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->render('document/new.html.twig', [
            'document' => $document,
            'form'     => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_document_show', methods: ['GET'])]
    public function show(Document $document): Response
    {
        return $this->render('document/show.html.twig', [
            'document' => $document,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_document_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Document $document, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_document_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('document/edit.html.twig', [
            'document' => $document,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_document_delete', methods: ['POST'])]
    public function delete(Request $request, Document $document, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $document->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($document);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_document_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/view/{url}', name: 'app_document_view', methods: ['GET', 'POST'])]
    public function view(
        string $url,
        Request $request,
        DocumentRepository $documentRepository
    ): Response {
        $document = $documentRepository->findOneBy(['url' => $url]);

        if (!$document) {
            throw $this->createNotFoundException('Document introuvable.');
        }

        $error = null;

        if ($request->isMethod('POST')) {
            $inputToken = $request->request->get('token');

            if ($inputToken === $document->getToken()) {
                return $this->render('document/view.html.twig', [
                    'document' => $document,
                    'granted'  => true,
                ]);
            }

            $error = 'Code incorrect, veuillez réessayer.';
        }

        return $this->render('document/view.html.twig', [
            'document' => $document,
            'granted'  => false,
            'error'    => $error,
        ]);
    }
}
