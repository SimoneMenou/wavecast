<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PodcastController extends AbstractController
{
    #[Route('/podcast', name: 'app_podcast')]
    public function podcast(): Response
    {
        
        return $this->render('podcast/create.html.twig');
    }
}
