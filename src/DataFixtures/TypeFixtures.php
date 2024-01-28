<?php

namespace App\DataFixtures;

use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class TypeFixtures extends Fixture
{

    private $counter = 1;

    public function load(ObjectManager $manager): void
    {
      $types = [
        '4x4',
        'Berline',
        'Break',
        'Cabriolet',
        'Citadine',
        'Coupé',
        'Minibus',
        'Monospace',
        'Moto',
        'Pick-up',
        'Suv',
        'Voiture société',
    ];

        foreach ($types as $typeLibelle){

          $type = new Type();
          $type->setLibelle($typeLibelle);
          $manager->persist($type);

          $this->addReference('type-'.$this->counter, $type);
          $this->counter++;
        }

        $manager->flush();
    }
    
}