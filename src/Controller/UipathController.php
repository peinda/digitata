<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UipathController extends AbstractController
{
    /**
     * @Route("/uipath", name="uipath")
     */
    public function index(): Response
    {
        return $this->render('uipath/index.html.twig', [
            'controller_name' => 'UipathController',
        ]);
    }

    
}
