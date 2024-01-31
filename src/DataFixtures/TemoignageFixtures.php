<?php

namespace App\DataFixtures;

use App\Entity\Temoignage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class TemoignageFixtures extends Fixture
{

    private $counter = 1;

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

      $names = [
        'Jhon Doe',
        'Daniel',
        'Sarah',
        'Jhony',
        'Raphaelle',
        'Paul',
    ];

        foreach ($names as $name){

          $temoignage = new Temoignage();
          $temoignage->setNom($name);
          $temoignage->setCommentaire($faker->text);
          $temoignage->setNote($faker->numberBetween(1, 5));
          $temoignage->setApprouve(true);
          $manager->persist($temoignage);

          $this->addReference('tem-'.$this->counter, $temoignage);
          $this->counter++;
        }

        $manager->flush();
    }
}