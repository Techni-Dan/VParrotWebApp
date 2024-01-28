<?php 

namespace App\DataFixtures;

use App\Entity\Employes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmployesFixtures extends Fixture

{
    private $counter = 1;
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++) {
            $employe = (new Employes())
                ->setNom("Employe$i")
                ->setPrenom("Prenom$i")
                ->setEmail("user$i@gmail.com")
                ->setPassword("$2y$13\$DwZADy4JSZ7pei5WlWaYXO9l1fjEArr1VMYpVkkEWH1YTq4YytDwe")
                ->setRoles(['ROLE_EMPLOYE'])
                ->setDateCreation(new \DateTimeImmutable());
            $manager->persist($employe);
            $this->addReference('empl-'.$this->counter, $employe);
            $this->counter++;
        }
        $manager->flush();
    }
}