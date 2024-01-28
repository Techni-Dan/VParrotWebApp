<?php

namespace App\Controller;

use App\Data\SearchData;
use App\Form\SearchForm;
use App\Service\NavType;
use App\Form\ContactType;
use App\Service\NavMarque;
use App\Service\NavModele;
use App\Service\NavCategorie;
use App\Service\NavCarburant;
use Symfony\Component\Mime\Email;
use App\Repository\TypeRepository;
use App\Repository\MarqueRepository;
use App\Repository\ModeleRepository;
use App\Repository\CategorieRepository;
use App\Repository\CarburantRepository;
use App\Repository\VehiculeRepository;
use App\Repository\VehiculeImageRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class OccasionsController extends AbstractController
{
    private $navCategorie;
    private $navType;
    private $navMarque;
    private $navModele;
    private $navCarburant;
    public function __construct(NavMarque $navMarque, NavModele $navModele, NavCategorie $navCategorie, NavType $navType, NavCarburant $navCarburant)
    {
        $this->navMarque = $navMarque;
        $this->navModele = $navModele;
        $this->navCategorie = $navCategorie;
        $this->navType = $navType;
        $this->navCarburant = $navCarburant;
    }

    #[Route('/occasions', name: 'app_occasions_page')]
    public function index(VehiculeRepository $vehiculeRepository, VehiculeImageRepository $vehiculeImageRepository, Request $request): Response
    {   
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);
        [$prixmin, $prixmax] = $vehiculeRepository->findPrixMinMax($data);
        [$kmmin, $kmmax] = $vehiculeRepository->findKmMinMax($data);
        [$anneemin, $anneemax] = $vehiculeRepository->findAnneeMinMax($data);
        $occasions = $vehiculeRepository->findSearch($data);
        // dd($data);
        //dd($occasions);
        
        $vehicules=$vehiculeRepository->findAll();
        $carImages = $vehiculeImageRepository->findBy(['vehicule'=>$vehicules],[]);
        if ($request->get('ajax')) {
            return new JsonResponse([
                'content' => $this->renderView('occasions/_occasions.html.twig', ['occasions' => $occasions]),
                'sorting' => $this->renderView('occasions/_sorting.html.twig', ['occasions' => $occasions]),
                'pagination' => $this->renderView('occasions/_pagination.html.twig', ['occasions' => $occasions]),
                //'pages' => ceil($occasions->getTotalItemCount() / $occasions->getItemNumberPerPage()),
                'prixmin' => $prixmin,
                'prixmax' => $prixmax,
                'kmmax' => $kmmax,
                'kmmin' => $kmmin,
                'anneemin' => $anneemin,
                'anneemax' => $anneemax
            ]);
        }
        return $this->render('occasions/index.html.twig', [
            'carImages' => $carImages,
            'occasions' => $occasions,
            'form' => $form->createView(),
            'prixmin' => $prixmin,
            'prixmax' => $prixmax,
            'kmmax' => $kmmax,
            'kmmin' => $kmmin,
            'anneemin' => $anneemin,
            'anneemax' => $anneemax,
            'marqueList' => $this->navMarque->marque(),
            'categorieList' => $this->navCategorie->categorie(),
            'typeList' => $this->navType->type(),
            'modeleList' => $this->navModele->modele(),
            'carburantList' => $this->navCarburant->carburant(),
        ]);
    }

    #[Route('/occasions/vehicule/{id}', name: 'app_exemplaire_show')]
    public function exemplaireShow(int $id, VehiculeRepository $vehiculeRepository, MailerInterface $mailer, Request $request): Response
    {
        $vehiculeId = $vehiculeRepository->find($id);
        $emailSubject = $vehiculeId->getModele();

        $form = $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $contactFormData = $form->getData();
            
            $message = (new Email())
                ->priority(Email::PRIORITY_HIGH)
                ->from($contactFormData['email'])
                ->to('test@gmail.com')
                ->subject($emailSubject)
                ->text('Expéditeur : '.$contactFormData['nom'].' '.$contactFormData['prenom'].\PHP_EOL.
                    'E-mail : '.$contactFormData['email'].\PHP_EOL.
                    'Téléphone : '.$contactFormData['tel'].\PHP_EOL.
                    'Message : '.$contactFormData['message'],
                    'text/plain');

            try {
                $mailer->send($message);
                $this->addFlash('success', 'Votre message a été envoyé.');
            } catch (TransportExceptionInterface $e) {
                echo $e->getDebug();

            }
        }

        return $this->render('occasions/vehicule.html.twig', [
            'exemplaire' => $vehiculeId,
            'contact_form' => $form->createView(),
        ]);
    }

    #[Route('/occasions/categorie/{id}', name: 'app_occcasions_categorie_show')]
    public function ocassionsByCategorie(int $id, VehiculeRepository $vehiculeRepository, CategorieRepository $categorieRepository):Response
    {
        $idCategorie = $categorieRepository->find($id);
        $categorieLibelle = $categorieRepository->findOneBy(['id'=>$idCategorie],[]);
        $exemplaireByCategorie = $vehiculeRepository->findBy(['categorie'=>$idCategorie],[]);

        return $this->render('occasions/vehiculeByCategorie.html.twig', [
            'occasions' => $exemplaireByCategorie,
            'categorieList' => $this->navCategorie->categorie(),
            'carburantList' => $this->navCarburant->carburant(),
            'marqueList' => $this->navMarque->marque(),
            'modeleList' => $this->navModele->modele(),
            'categorie' => $categorieLibelle,
            'typeList' => $this->navType->type(),
        ]);
    }

    #[Route('/occasions/type/{id}', name: 'app_occcasions_type_show')]
    public function ocassionsByType(int $id, VehiculeRepository $vehiculeRepository, TypeRepository $typeRepository):Response
    {
        $idType = $typeRepository->find($id);
        $typeLibelle = $typeRepository->findOneBy(['id'=>$idType],[]);
        $exemplaireByType = $vehiculeRepository->findBy(['type'=>$idType],[]);

        return $this->render('occasions/vehiculeByType.html.twig', [
            'occasions' => $exemplaireByType,
            'categorieList' => $this->navCategorie->categorie(),
            'marqueList' => $this->navMarque->marque(),
            'modeleList' => $this->navModele->modele(),
            'carburantList' => $this->navCarburant->carburant(),
            'typeList' => $this->navType->type(),
            'type' => $typeLibelle,
            
        ]);
    }

    #[Route('/occasions/marque/{id}', name: 'app_occcasions_marque_show')]
    public function ocassionsByMarque(int $id, VehiculeRepository $vehiculeRepository, MarqueRepository $marqueRepository):Response
    {
        $idMarque = $marqueRepository->find($id);
        $marqueNom = $marqueRepository->findOneBy(['id'=>$idMarque],[]);
        $vehiculeByMarque = $vehiculeRepository->findBy(['marque'=>$idMarque],[]);

        return $this->render('occasions/vehiculeByMarque.html.twig', [
            'occasions' => $vehiculeByMarque,
            'marqueList' => $this->navMarque->marque(),
            'modeleList' => $this->navModele->modele(),
            'categorieList' => $this->navCategorie->categorie(),
            'carburantList' => $this->navCarburant->carburant(),
            'typeList' => $this->navType->type(),
            'marque' => $marqueNom,
            
        ]);
    }

    #[Route('/occasions/modele/{id}', name: 'app_occcasions_modele_show')]
    public function ocassionsByModele(int $id, VehiculeRepository $vehiculeRepository, ModeleRepository $modeleRepository):Response
    {
        $idModele = $modeleRepository->find($id);
        $modeleNom = $modeleRepository->findOneBy(['id'=>$idModele],[]);
        $vehiculeByModele = $vehiculeRepository->findBy(['modele'=>$idModele],[]);

        return $this->render('occasions/vehiculeByModele.html.twig', [
            'occasions' => $vehiculeByModele,
            'marqueList' => $this->navMarque->marque(),
            'modeleList' => $this->navModele->modele(),
            'categorieList' => $this->navCategorie->categorie(),
            'carburantList' => $this->navCarburant->carburant(),
            'typeList' => $this->navType->type(),
            'modele' => $modeleNom,
            
        ]);
    }

    #[Route('/occasions/carburant/{id}', name: 'app_occcasions_carburant_show')]
    public function ocassionsByCarburant(int $id, VehiculeRepository $vehiculeRepository, CarburantRepository $carburantRepository):Response
    {
        $idCarburant = $carburantRepository->find($id);
        $carburantLibelle = $carburantRepository->findOneBy(['id'=>$idCarburant],[]);
        $vehiculeByCarburant = $vehiculeRepository->findBy(['carburant'=>$idCarburant],[]);

        return $this->render('occasions/vehiculeByCarburant.html.twig', [
            'occasions' => $vehiculeByCarburant,
            'marqueList' => $this->navMarque->marque(),
            'modeleList' => $this->navModele->modele(),
            'categorieList' => $this->navCategorie->categorie(),
            'carburantList' => $this->navCarburant->carburant(),
            'typeList' => $this->navType->type(),
            'carburant' => $carburantLibelle,
            
        ]);
    }
}
