<?php

namespace App\Service;

use App\Repository\ModeleRepository;

class NavModele
{
    private $modeleRepository;

    public function __construct(ModeleRepository $modeleRepository)
    {
        $this->modeleRepository = $modeleRepository;
    }

    public function modele():array
    {
        return $this->modeleRepository->findAll();
    }
}