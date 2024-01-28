<?php

namespace App\DataFixtures;

use App\Entity\Carburant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class CarburantFixtures extends Fixture
{

    private $counter = 1;

    public function load(ObjectManager $manager): void
    {
      $categories = [
        'Diesel',
        'Esence',
        'Hybride',
        'Électrique',
        'GPL',
        'Hydrogène',
    ];

        foreach ($categories as $categorieLibelle){

          $categorie = new Carburant();
          $categorie->setLibelle($categorieLibelle);
          $manager->persist($categorie);

          $this->addReference('carb-'.$this->counter, $categorie);
          $this->counter++;
        }

        $manager->flush();
    }
}