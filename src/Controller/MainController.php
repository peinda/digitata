<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->redirectToRoute('accueil');
       /* return $this->render('main/offres.html.twig', [
            'controller_name' => 'MainController',
        ]);*/
    }
}
