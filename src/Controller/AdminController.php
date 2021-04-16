<?php

namespace App\Controller;

use App\Entity\Candidats;
use App\Entity\Offres;
use App\Form\OffreType;
use App\Repository\OffresRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


/**
 * Class AdminController
 * @package App\Controller
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("", name="admin_offres")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */

    public function index(Request $request, EntityManagerInterface $manager): Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        if(!$this->isGranted("ROLE_ADMIN"))
        {
            throw  new AccessDeniedException("Vous n'avez pas le droit");
        }
        $ofrres = new Offres();

        $offresform = $this->createForm(OffreType::class, $ofrres);
        $offresform->handleRequest($request);
        if($offresform->isSubmitted() && $offresform->isValid()){
            $ofrres->setPublishedAT(new \DateTime());
            $manager->persist($ofrres);
            $manager->flush();
            return $this->redirectToRoute('liste_offres');

        }
        return $this->render('admin/addoffres.html.twig', [
            'offreform'=>$offresform->createView()

        ]);
    }


    /**
     * @Route("/offres", name="admin_listesOffres")
     */
    public function list()
    {
        $offreRepo = $this->getDoctrine()->getRepository(Offres::class);
        $offres = $offreRepo->findAll();
        return $this->render('admin/offres.html.twig', [
            "offres"=> $offres
        ]);

    }

    /**
     * @param $id
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @Route("/offre/update/{id}", name="offre_update",  requirements={"id": "\d+"})
     * @return RedirectResponse|Response
     */
    public function updatesortie($id, Request $request, EntityManagerInterface $entityManager)
    {
        $offreRepo=$this->getDoctrine()->getRepository(Offres::class);
        $offre = $offreRepo->find($id);
        $updateOffre = $this->createForm(OffreType::class, $offre);
        $updateOffre->handleRequest($request);
        if($updateOffre->isSubmitted() && $updateOffre->isValid()){
            $entityManager->persist($offre);
            $entityManager->flush();
            $this->addFlash("success", "modification réussie");

            return $this->redirectToRoute('admin_listesOffres', []);

        }
        return $this->render('admin/updateOffre.html.twig', [
            'updateoffre'=>$updateOffre->createView()
        ]);


    }
    /**
     * @Route("/candidats", name="admin_candidats")
     */
    public function listcandidats(): Response
    {
        $candidatsRepo = $this->getDoctrine()->getRepository(Candidats::class);
        $candidats= $candidatsRepo->findAll();
        return $this->render('admin/candidtas.html.twig', [
            "candidats"=> $candidats
        ]);

    }

}
