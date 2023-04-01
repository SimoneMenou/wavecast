<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
//Pour faire des requêtes
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class XmlConvertisseurController extends AbstractController
{
    #[Route('/xml/convertisseur', name: 'app_xml_convertisseur')]
    public function index(): Response
    {
        return $this->render('xml_convertisseur/index.html.twig', [
            'controller_name' => 'XmlConvertisseurController',
        ]);
    }

    ///////////////////////////Ici le code de modification 
    /**
     * @Route("/mp3-to-xml", name="mp3_to_xml", methods={"POST"})
     */
    /*
    public function RecupMp3ToXml(Request $request): Response
    {
        // Récupération du fichier MP3 à partir de la requête
        $mp3File = $request->files->get('mp3_file');

        // Vérification que le fichier est bien un fichier MP3
        if ($mp3File && $mp3File->getClientOriginalExtension() === 'mp3') {
            // Conversion du fichier MP3 en XML
            $xml = $this->convertMp3ToXml($mp3File);

            // Renvoi du fichier XML en réponse
            return new Response($xml, 200, [
                'Content-Type' => 'application/xml'
            ]);
        } else {
            // Renvoi d'une erreur si le fichier n'est pas un fichier MP3
            return new Response('Invalid file format', 400);
        }
    }

     /**
     * Convertit un fichier MP3 en XML pour en faire un podcast.
     */
    /*
    private function convertMp3ToXml($mp3File)
    {
        // Implémentation de la conversion MP3 vers XML
        // ...

        // Retourne le fichier XML généré
      return $xml;
    }
 */
}
