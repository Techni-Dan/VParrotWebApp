<?php

namespace App\Controller;

use App\Entity\Temoignage;
use App\Form\TemoignageType;
use App\Repository\ServiceRepository;
use App\Repository\TemoignageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ServiceRepository $serviceRepository, TemoignageRepository $temoignageRepository, EntityManagerInterface $entityManager, Request $request): Response
    {
        $approuve = true;
        $services = $serviceRepository->findAll();
        $temoignages = $temoignageRepository->findBy(['Approuve'=>$approuve],[]);
        //dd($temoignages);
        $temoignage = new Temoignage();
        $form = $this->createForm(TemoignageType::class, $temoignage);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $temoignage->setApprouve('0');
            $entityManager->persist($temoignage);
            $entityManager->flush();
            $this->addFlash('success', 'Votre commentaire a été envoyé. Il sera publié après modération');
        }
        return $this->render('home/index.html.twig', [
            'title' => 'Garrage Automobile Vincent PARROT',
            'services' => $services,
            'temoignages' => $temoignages,
            'temoignage_form' => $form->createView(),
        ]);
    }
}
