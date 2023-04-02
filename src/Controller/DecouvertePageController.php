<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DecouvertePageController extends AbstractController
{
    #[Route('/decouverte/page', name: 'app_decouverte_page')]
    public function index(): Response
    {
        return $this->render('decouverte_page/index.html.twig', [
            'controller_name' => 'DecouvertePageController',
        ]);
    }
}
