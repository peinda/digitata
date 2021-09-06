<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\MailerType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @param ContactNotification $contactNotification
     * @return Response
     */
    public function index(Request $request, ContactNotification $contactNotification): Response
    {
        $contact = new Contact();
        $form = $this->createForm(MailerType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactNotification ->notify($contact);

            $this->addFlash("success", "Votre email a été bien envoyé et 
          nous allons vous répondre dans un bref délai.");

            return  $this->redirectToRoute('contact');
        }


        return $this->render('mailer/index.html.twig', ['contactForm' => $form->createView()]);
    }
}
