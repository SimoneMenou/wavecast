<?php

namespace App\Controller;

use doctrine;
use App\Entity\AudioFile;
use App\Form\AudioFileType;
use Doctrine\DBAL\Types\TextType;
use App\Repository\AudioFileRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

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
    public function new(Request $request, AudioFileRepository $audioFileRepository, ManagerRegistry $doctrine ): Response
    {
        $audioFile = new AudioFile();
        $form = $this->createForm(AudioFileType::class, $audioFile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $audioFileRepository->save($audioFile, true);

            $audioFile->setUser($this->getUser());
            $manager = $doctrine ->getManager();
            $manager->persist($audioFile);
            $manager->flush();

            return $this->redirectToRoute('app_audio_file_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('audio_file/new.html.twig', [
            'audio_file' => $audioFile,
            'form' => $form,
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
        if ($this->isCsrfTokenValid('delete' . $audioFile->getId(), $request->request->get('_token'))) {
            $audioFileRepository->remove($audioFile, true);
        }

        return $this->redirectToRoute('app_audio_file_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/all', name: 'get_all_songs_json', methods: ['GET'])]
    public function getAllSongs(AudioFileRepository $audioFileRepository): Response
    {
        //Preparation des fichiers 
        $songs = $audioFileRepository->findAll();

        $data = [];
        foreach ($songs as $song) {
            $data[] = [
                    'id' => $song->getId(),
                    'titre' => $song->getTitre()
            // reste
            ];
        }

        // dd(json_encode(['data' => $data]));
        return new JsonResponse(['data' => $data]);
    }
}
