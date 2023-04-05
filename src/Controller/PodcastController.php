<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PodcastController extends AbstractController
{
    #[Route('/podcast', name: 'app_podcast')]
    public function podcast(): Response
    {
        
        return $this->render('podcast/create.html.twig');
    }


    #[Route('/podcast/confirmation', name: 'podcast_confirmation')]
    public function podcastConfirmation(Request $req): Response
    {
        $songsIds = $req->request->all()['songs'];

        // $podcast = new Podcast();
        // foreach ($songsIds as $songId){
        //     // chercher le audio dans la bd
        //     find($songId)
        //     // faire add dans le podcast
        //     $podcast->addSong($song)
        //     // persist et flush

        // }

        

        dd('entregistrement ok');
        // return $this->render('podcast/confirmation.html.twig');
    }
}
