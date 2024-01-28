<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    #[Route('/apropos', name: 'app_apropos')]
    public function apropos(): Response
    {
        return $this->render('pages/apropos.html.twig', [
            'title' => 'A propos',
       ]);
    }

    #[Route('/mentions', name: 'mentions_legales')]
    public function contact(): Response
    {
        return $this->render('pages/mentions.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'Mentions légales',
       ]);
    }

    #[Route('/cgu', name: 'page_cgu')]
    public function cgu(): Response
    {
        return $this->render('pages/cgu.html.twig', [
            'controller_name' => 'PagesController',
            'title' => 'CGU',
        ]);
    }
}
