<?php

namespace App\DataFixtures;

use App\DataFixtures\EmployesFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager; // Corrected namespace
use Faker\Factory;
use App\Entity\VehiculeImage;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class VehiculeImageFixtures extends Fixture implements DependentFixtureInterface
{   
    private $counter = 1;
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 1000; $i++) {
            $vehiculeImage = new VehiculeImage();
            $vehiculeImage->setImageName('chiron3-6571826b112d9397779940.jpeg');
            $vehiculeImage->setImageSize('44753');
            $vehiculeImage->setUpdatedAt(new \DateTimeImmutable()); 
            
            $vehicule = $this->getReference('veh-' . $this->counter);
            $vehiculeImage->setVehicule($vehicule); 

            $manager->persist($vehiculeImage);
            $this->addReference('vehImg-'.$this->counter, $vehiculeImage);
            $this->counter++;
        }

        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            VehiculeFixtures::class,
        ];
    }
}

