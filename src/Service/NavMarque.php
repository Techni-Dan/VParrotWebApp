<?php

namespace App\Service;

use App\Repository\MarqueRepository;

class NavMarque
{
    private $marqueRepository;

    public function __construct(MarqueRepository $marqueRepository)
    {
        $this->marqueRepository = $marqueRepository;
    }

    public function marque():array
    {
        return $this->marqueRepository->findAll();
    }
}