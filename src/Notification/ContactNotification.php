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

            ->setFrom('noreplay@digitata-it.fr')

            ->setTo('contact@digitata-it.com')
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

}