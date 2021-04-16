<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index(): Response
    {

       // return $this->redirectToRoute('admin_listesOffres');
       return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    /**
     * @Route("/accueil/pc", name="politique")
     */
    public function polique()
    {
        return $this->render('accueil/politique.html.twig', [

        ]);
    }

    /**
     * @Route("/accueil/cgu", name="condition")
     */
    public function condition()
    {
        return $this->render('accueil/politique.html.twig', [

        ]);
    }
}
