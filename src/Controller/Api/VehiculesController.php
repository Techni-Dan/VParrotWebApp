<?php

namespace App\Controller\Api;


use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializationContext;
use App\Repository\VehiculeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VehiculesController extends AbstractController
{
    #[Route(path:'api/vehicules', name:"api_vehicules_index", methods:['GET'])]
    public function index(VehiculeRepository $vehiculesRepository, SerializerInterface $serializer):JsonResponse
    {
        $vehicules = $vehiculesRepository->findAll();

        $context = SerializationContext::create()->setGroups("getVehicules");
        $jsonVehicules = $serializer->serialize($vehicules,'json', $context);

        return new JsonResponse($jsonVehicules, Response::HTTP_OK,[],true);

    }

    #[Route(path:'api/vehiculesby', name:"api_vehiculesby_index", methods:['GET'])]
    public function vehiculesBy(VehiculeRepository $vehiculesRepository, SerializerInterface $serializer, PaginatorInterface $paginator, Request $request):JsonResponse
    {
        $vehicules = $vehiculesRepository->findBy([],[]);
        $vehiculesPager = $paginator->paginate(
            $vehicules,
            $request->query->getInt('page',1),3
        );

        $data = [];
        foreach ($vehiculesPager->getItems() as $key=>$value){
            $dataItem = [
                'vehicules'=>$value
            ];
            $data[] = $dataItem;
        }
        
        $getData = [
            'data' => $data,
            'curent_page_number'=>$vehiculesPager->getCurrentPageNumber(),
            'number_per_page'=>$vehiculesPager->getItemNumberPerPage(),
            'total_count'=>$vehiculesPager->getTotalItemCount()
        ];

        $context = SerializationContext::create()->setGroups("getVehicules");
        
        $jsonVehicules = $serializer->serialize($getData,'json', $context);

        return new JsonResponse($jsonVehicules, Response::HTTP_OK,[],true);

    }

    #[Route(path:'api/vehicules/{id}', name:"api_vehicule_show", methods:['GET'])]
    public function showProduct(int $id, VehiculeRepository $vehiculesRepository, SerializerInterface $serializer):JsonResponse
    {
        $vehicules = $vehiculesRepository->find($id);
        $context = SerializationContext::create()->setGroups("getVehicules");
        $jsonVehicules = $serializer->serialize($vehicules,'json', $context);

        return new JsonResponse($jsonVehicules, Response::HTTP_OK,[],true);

    }
}