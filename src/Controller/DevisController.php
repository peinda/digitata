<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\DevisType;
use App\Form\MailerType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DevisController extends AbstractController
{
    /**
     * @Route("/devis", name="devis")
     * @param Request $request
     * @param ContactNotification $contactNotification
     * @return Response
     */
    public function index(Request $request, ContactNotification $contactNotification): Response
    {
        $contact = new Contact();
        $form = $this->createForm(DevisType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactNotification ->devis($contact);

            $this->addFlash("success", "Votre email a été bien envoyé et 
          nous allons vous répondre dans un bref délai.");

            return  $this->redirectToRoute('accueil');
        }


        return $this->render('devis/devis.html.twig', ['contactForm' => $form->createView()]);
    }
}
