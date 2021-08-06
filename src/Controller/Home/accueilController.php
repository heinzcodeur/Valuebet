<?php

namespace App\Controller\Home;

use App\Entity\Affiche;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class accueilController extends AbstractController
{
    /**
     * @Route("/", name="home_accueil")
     */
    public function index(): Response
    {

        $matchs = $this->getDoctrine()->getRepository(Affiche::class)->findAll();

        return $this->render('home/accueil/index.html.twig', [
            'controller_name' => 'accueilController',
            'locale' => 'en',
            'matchs' => $matchs
        ]);
    }
}
