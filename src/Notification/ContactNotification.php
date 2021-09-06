<?php


namespace App\Notification;


use App\Entity\Contact;
use Twig\Environment;

class ContactNotification
{
    /**
     * @var Environment
     */
    private $environment;

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    public function __construct(\Swift_Mailer $mailer, Environment $environment)
    {
        $this->mailer = $mailer;
        $this->environment = $environment;

    }

    public function notify(Contact $contact)
    {
        $message = (new \Swift_Message('Demande D\'info:'.$contact->getFirstname()))

            ->setFrom($contact->getEmail())

            ->setTo('contact@digitata-it.fr')
            ->setReplyTo($contact->getEmail())
            ->setBody(
               $this->environment->render('email/contact.html.twig', [
                   'contact' => $contact
                   ]
                    ),
                    'text/html'
                )
            ;
        $this->mailer->send($message);
    }

    public function devis(Contact $contact)
    {
        $message = (new \Swift_Message('Demande D\'info:'.$contact->getFirstname()))

            ->setFrom($contact->getEmail())

            ->setTo('contact@digitata-it.fr')
            ->setReplyTo($contact->getEmail())
            ->setBody(
                $this->environment->render('email/devis.html.twig', [
                        'contact' => $contact
                    ]
                ),
                'text/html'
            )
        ;
        $this->mailer->send($message);
    }

    public function booking(Contact $contact)
    {
        $message = (new \Swift_Message('Demande de rendez vous:'.$contact->getFirstname()))

            ->setFrom($contact->getEmail())

            ->setTo('contact@digitata-it.fr')
            ->setReplyTo($contact->getEmail())
            ->setBody(
                $this->environment->render('booking/bookingcontact.html.twig', [
                        'contact' => $contact
                    ]
                ),
                'text/html'
            )
        ;
        $this->mailer->send($message);
    }

}