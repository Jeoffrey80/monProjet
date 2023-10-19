<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        $info = ['lastname' => 'QUOI PUTAIN ', 'firstname' => 'DE FEUR DE ', 'email' => 'MERDE@TG.DEBOIS', 'birthdate' => '06/06/666'];

        return $this->render('profil/index.html.twig', [
            'informations' => $info
        ]);
    }
}
