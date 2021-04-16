<?php

namespace App\Controller;

use App\Entity\Politique;
use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/register", name="user_register")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param UserPasswordEncoderInterface $encoder
     * @param \Swift_Mailer $mailer
     * @return Response
     */
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder, \Swift_Mailer $mailer): Response
    {
        $user = new User();
        $politique = new Politique();
        $user->setAdministrateur(0);
        $user->setActif(0);
        $user->setRoles(["ROLE_USER"]);
        $registerForm = $this->createForm(UserType::class, $user);
        $registerForm->handleRequest($request);
        if($registerForm->isSubmitted() && $registerForm->isValid()){
            $hased = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hased);
            $user->setActivationToken(md5(uniqid()));
            //$user->setPolitique($politique);
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash("success", "Un mail vous a été envoyé cliquer sur le lien pour activer votre compte");
            $message = (new \Swift_Message('Activation compte'))
                ->setFrom('mon@adresse.fr')
                ->setTo($user->getEmail())
                ->setBody(
                    $this->renderView(
                        'email/activation.html.twig',
                        ['token' => $user->getActivationToken()]
                    ),
                    'text/html'
                );

            $mailer->send($message);
            return  $this->redirectToRoute('accueil');


        }
        return $this->render('user/register.html.twig', [
            "registerform"=>$registerForm->createView()
        ]);
    }

    /**
     * @Route ("/login", name="login")
     */
    public function login(Request $request)
    {
        $session= $request->getSession();
        $session->start();
        return $this->render("user/login.html.twig", []);
    }

    /**
     * @Route ("/logout", name="logout")
     */
    public function logout(Request $request)
    {
        $session= $request->getSession();

        $session->invalidate();
        session_destroy();
        return $this->render("user/register.html.twig", []);

    }
}
