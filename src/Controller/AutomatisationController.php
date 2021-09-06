<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutomatisationController extends AbstractController
{
    /**
     * @Route("/automatisation", name="automatisation")
     */
    public function index(): Response
    {
        return $this->render('automatisation/automatisation.html.twig', [
            'controller_name' => 'AutomatisationController',
        ]);
    }


    /**
     * @Route("/automatisation/uipath", name="uipath")
     */
    public function uipath(): Response
    {
        return $this->render('automatisation/uipath.html.twig', [
            'controller_name' => 'AutomatisationController',
            
        ]);
    }
}
