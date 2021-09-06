<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VbaController extends AbstractController
{
    /**
     * @Route("/vba", name="vba")
     */
    public function index(): Response
    {
        return $this->render('vba/vba.html.twig', [
            'controller_name' => 'VbaController',
        ]);
    }
}
