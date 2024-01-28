<?php

namespace App\Service;

use App\Repository\CarburantRepository;

class NavCarburant
{
    private $carburantRepository;

    public function __construct(CarburantRepository $carburantRepository)
    {
        $this->carburantRepository = $carburantRepository;
    }

    public function carburant():array
    {
        return $this->carburantRepository->findAll();
    }
}