<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class MailerController extends AbstractController
{
    #[Route('/email', name:'app_mailer')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        try {
            $email = (new Email())
                ->from('ouah@lol.com')
                ->to('Enzoledozo@doz.fr')
                ->subject('york york york')
                ->text('Tu as dis quoi ? J ai dis feur mec')
                ->html('<p>tutu</p>'); 

            $mailer->send($email);

            return new Response('Email sent successfully');
        } catch (\Exception $e) {
            return new Response('Error sending email: ' . $e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}