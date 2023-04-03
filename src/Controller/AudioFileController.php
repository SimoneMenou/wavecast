<?php

namespace App\Controller;

use App\Entity\AudioFile;
//use App\Form\AudioFileType;
use Symfony\Component\Form\FormFactoryInterface;
use App\Repository\AudioFileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/audio/file')]
class AudioFileController extends AbstractController
{
    #[Route('/', name: 'app_audio_file_index', methods: ['GET'])]
    public function index(AudioFileRepository $audioFileRepository): Response
    {
        return $this->render('audio_file/index.html.twig', [
            'audio_files' => $audioFileRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_audio_file_new', methods: ['GET', 'POST'])]
    /*public function new(Request $request, AudioFileRepository $audioFileRepository): Response
    {
        $audioFile = new AudioFile();
        $form = $this->createForm(AudioFileType::class, $audioFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $audioFileRepository->save($audioFile, true);

            return $this->redirectToRoute('app_audio_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('audio_file/new.html.twig', [
            'audio_file' => $audioFile,
            'form' => $form,
        ]);
    }*/
    public function newAudioFile(Request $request, FormFactoryInterface $formFactory)
    {
        $form = $formFactory->createBuilder(FormType::class)
            ->add('name', TextType::class)
            ->add('submit', SubmitType::class, ['label' => 'Save'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle form submission
        }

        return $this->render('example.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_audio_file_show', methods: ['GET'])]
    public function show(AudioFile $audioFile): Response
    {
        return $this->render('audio_file/show.html.twig', [
            'audio_file' => $audioFile,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_audio_file_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AudioFile $audioFile, AudioFileRepository $audioFileRepository): Response
    {
        $form = $this->createForm(AudioFileType::class, $audioFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $audioFileRepository->save($audioFile, true);

            return $this->redirectToRoute('app_audio_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('audio_file/edit.html.twig', [
            'audio_file' => $audioFile,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_audio_file_delete', methods: ['POST'])]
    public function delete(Request $request, AudioFile $audioFile, AudioFileRepository $audioFileRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$audioFile->getId(), $request->request->get('_token'))) {
            $audioFileRepository->remove($audioFile, true);
        }

        return $this->redirectToRoute('app_audio_file_index', [], Response::HTTP_SEE_OTHER);
    }
}
