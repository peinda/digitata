<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatControlerController extends AbstractController
{
    /**
     * @Route("/candidat/controler", name="candidat")
     */
    public function index(): Response
    {
        return $this->render('candidat_controler/admin.html.twig', [
            'controller_name' => 'CandidatControlerController',
        ]);
    }
}
