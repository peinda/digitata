<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\BookingType;
use App\Form\MailerType;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{

    /**
     * @Route("/booking", name="booking")
     * @param Request $request
     * @param ContactNotification $contactNotification
     * @return Response
     */
    public function index(Request $request, ContactNotification $contactNotification): Response
    {
        $contact = new Contact();
        $form = $this->createForm(BookingType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactNotification ->booking($contact);

            $this->addFlash("success", "Votre email a été bien envoyé et 
          nous allons vous répondre dans un bref délai.");

            return  $this->redirectToRoute('booking');
        }


        return $this->render('booking/booking.html.twig', ['contactForm' => $form->createView()]);
    }

}
