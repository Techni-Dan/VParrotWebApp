<?php

namespace App\Service;

use App\Repository\TypeRepository;

class NavType
{
    private $typeRepository;

    public function __construct(TypeRepository $typeRepository)
    {
        $this->typeRepository = $typeRepository;
    }

    public function type():array
    {
        return $this->typeRepository->findAll();
    }
}