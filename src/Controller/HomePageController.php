<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\SecurityController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

//Ici on a le controlleur qui gére la page principale de mon app ici c'est la source.
class HomePageController extends AbstractController
{
    //#[Route('/home/page', name: 'app_home_page')] Cette route va juste avoir comme marquage / sans nom pour être défini comme la racine de l'app
    #[Route('/', name: 'app_home_page')]
    public function index(): Response
    {
        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
