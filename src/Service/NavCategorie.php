<?php

namespace App\Service;

use App\Repository\CategorieRepository;

class NavCategorie
{
    private $categorieRepository;

    public function __construct(CategorieRepository $categorieRepository)
    {
        $this->categorieRepository = $categorieRepository;
    }

    public function categorie():array
    {
        return $this->categorieRepository->findAll();
    }
}