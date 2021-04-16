<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartementController extends AbstractController
{
    /**
     * @Route("/departement", name="departement")
     */
    public function index(): Response
    {
        return $this->render('departement/departement.html.twig', [
            'controller_name' => 'DepartementController',
        ]);
    }
}
