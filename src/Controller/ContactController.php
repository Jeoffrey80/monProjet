<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\DemoFormType;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

// ...



class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactFormType::class, null);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement des données du formulaire
            $data = $form->getData();
            
            // Créez et enregistrez un nouvel contact en base de données
            $message = new Contact();
            $message = $data;
         

            $entityManager->persist($message);
            $entityManager->flush();

            // Envoi de l'e-mail
            $email = (new TemplatedEmail())
                ->from('totodutoto@toto.com') // Remplacez par votre adresse e-mail
                ->to('tutudututu@tutu.com') // Adresse e-mail du destinataire
                ->subject($message->getObjet())
                ->context([
                    'subject' => $message->getObjet(),
                    'useremail' => $message->getEmail(),
                    'message' => $message->getMessage(),
                ])
                ->htmlTemplate('mailer/index.html.twig');

            $mailer->send($email);

            // Redirection vers la page d'accueil ou une autre page de confirmation
            return $this->redirectToRoute('app_accueil');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
