<?php

namespace App\Controller;

use App\Entity\Candidats;
use App\Entity\Offres;
use App\Form\CandidatType;
use App\Form\OffreType;
use App\Repository\CandidatsRepository;
use App\Repository\OffresRepository;
use App\Services\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class OffreControlerController extends AbstractController
{

    /**
     * @Route("/offres/liste", name="liste_offres")
     */
    public function list()
    {
        $offreRepo = $this->getDoctrine()->getRepository(Offres::class);
        $offres = $offreRepo->findAll();
        return $this->render('offres/listeOffres.html.twig', [
            "offres"=> $offres
        ]);

    }

    /**
     * @Route("/offres/{id}", name="offre_detail",  requirements={"id": "\d+"}, methods={"GET"})
     * @param $id
     * @return Response
     */
    public  function  detailOffre($id): Response
    {
        $offreRepo = $this->getDoctrine()->getRepository(Offres::class);
        $offre = $offreRepo->find($id);
        return $this->render('offres/detailOffres.html.twig', [
            "offre"=>$offre
        ]);

    }

    /**
     * @Route("/postuler/{id}", name="postuler",requirements={"id": "\d+"})
     * @param $id
     * @param FileUploader $fileUploader
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @param CandidatsRepository $repository
     * @return RedirectResponse|Response
     */
    public function postuler($id,FileUploader $fileUploader, EntityManagerInterface $entityManager, Request $request, \Swift_Mailer $mailer, CandidatsRepository $repository)
    {

        if(null === $offre = $entityManager->getRepository(Offres::class)->find($id)) {
            throw $this->createNotFoundException('Aucune offre trouvée pour cet identifiant ' . $id);
        }

        $candidat = new Candidats();
        $candidatForm = $this->createForm(CandidatType::class, $candidat);
        $candidatForm->handleRequest($request);
        if($candidatForm->isSubmitted() && $candidatForm->isValid()) {
            $candidatNotification = $candidatForm->getData();
            $candidatpost = $repository->findOneBySomeField($candidatNotification->getEmail());
            if($offre->getCandidats()->contains($candidatpost)) {
                $this->addFlash("success", "Vous avez déjà postulé à cette offre.");
                return $this->redirectToRoute('liste_offres');
            }
            $brochureFile = $candidatForm->get('brochure')->getData();
            if ($brochureFile) {

                $brochureFileName = $fileUploader->upload($brochureFile);
                $candidat->setBrochureFilename($brochureFileName);
            }
            $entityManager->persist($candidat);
            $entityManager->flush();
            $offre->addCandidat($candidat);
            $entityManager->persist($offre);
            $entityManager->flush();

            $this->addFlash("success", "Merci pour votre candidature");
            $message = (new \Swift_Message('Accusé réception de votre candidature'))

                ->setFrom('noreplay@digitata-it.fr')

                ->setTo( $candidatNotification->getEmail() )
                ->setReplyTo( $candidatNotification->getEmail() )
                ->setBody(
                   "<p>Bonjour nous avons bien reçu votre candidature et nous vous en remercions.
                            Si votre candidature correspond au profil cherché, nous prendrons contact avec vous dans un
                             bref délai<p/>.",

                    'text/html'
                )
            ;
            $mailer->send($message);
            return $this->redirectToRoute('liste_offres');
        }

        return $this->render('offres/candidat.html.twig', [
            "candidat" => $candidatForm->createView(),
            "offre" => $offre
        ]);




    }
}
