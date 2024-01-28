<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CategorieFixtures extends Fixture
{

    private $counter = 1;

    public function load(ObjectManager $manager): void
    {
      $categories = [
        'Voiture',
        'Moto',
        'Camion',
        'Utilitaire',
    ];

        foreach ($categories as $categorieLibelle){

          $categorie = new Categorie();
          $categorie->setLibelle($categorieLibelle);
          $manager->persist($categorie);

          $this->addReference('cat-'.$this->counter, $categorie);
          $this->counter++;
        }

        $manager->flush();
    }
    
}
