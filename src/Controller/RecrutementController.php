<?php

namespace App\Controller;

use App\Entity\Offres;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecrutementController extends AbstractController
{
    /**
     * @Route("/recrutement", name="recrutement")
     */
    public function index(): Response
    {
        $offreRepo = $this->getDoctrine()->getRepository(Offres::class);
        $offres = $offreRepo->findAll();
        return $this->render('recrutement/recrutement.html.twig', [
            "offres"=> $offres
        ]);
    }

}
