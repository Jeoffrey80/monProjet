<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use App\Repository\DiscRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AccueilController extends AbstractController
{
    

    private $artistRepo;
    private $discRepo;
    private $em;

    public function __construct(ArtistRepository $artistRepo, DiscRepository $discRepo, EntityManagerInterface $em)
    {
        $this->artistRepo = $artistRepo;
        $this->discRepo = $discRepo;
        $this->em = $em;

    }
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
       //on appelle le repository pour accéder à la fonction
        $artistes = $this->artistRepo->getSomeArtists("Damso");

        //on teste le contenu de la variable $artistes : dd() veut dire Dump and Die
        dd($artistes); 

     // ...    

    }

    

}