<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DigitataController extends AbstractController
{
    /**
     * @Route("/digitata", name="digitata")
     */
    public function digitata(): Response
    {
        return $this->render('digitata/digitata.html.twig', [
            
        ]);
    }
}
