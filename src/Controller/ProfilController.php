<?php

namespace App\Controller;

use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ProfilController extends AbstractController
{
    private $userRepo;

    public function __construct(UtilisateurRepository $userRepo){
        $this->userRepo = $userRepo;
    }
    #[isGranted('ROLE_CLIENT', message: "Nous sommes désolés, vous ne disposez pas des autorisations nécessaires pour accèder à cette page!")]
    #[Route('/profil', name: 'app_profil')]
    public function index(): Response
    {
        $identifiant = $this->getUser()->getUserIdentifier(); //<-- ICI on récupère l'identifiant unique de l'utilisateur connecté 
        if($identifiant){
            $info = $this->userRepo->findOneBy(["email" =>$identifiant]); //<--- ICI on vérifie qu'on a bien un utilisateur dans la base de donnée qui a ce mail 
        }

        return $this->render('profil/index.html.twig', [
            'informations' => $info
        ]);
    }
}