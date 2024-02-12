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
    $admin = new Employes();
    $admin->setNom("PARROT");
    $admin->setPrenom("Vincent");
    $admin->setEmail("admin@mail.com");
    $admin->setPassword("$2y$13\$Uw2an3wQTYcBqGe0LMIn1OQxyUa4iQLwTZ1IoW2kj3CEcB0l8G7Sm");
    $admin->setRoles(['ROLE_ADMIN']);
    $admin->setDateCreation(new \DateTimeImmutable());
    $manager->persist($admin);
    $this->addReference('empl-' . $this->counter, $admin);
    $this->counter++;

    for ($i = 0; $i < 10; $i++) {
      $employe = (new Employes())
        ->setNom("Employe$i")
        ->setPrenom("Prenom$i")
        ->setEmail("user$i@mail.com")
        ->setPassword("$2y$13\$Uw2an3wQTYcBqGe0LMIn1OQxyUa4iQLwTZ1IoW2kj3CEcB0l8G7Sm")
        ->setRoles(['ROLE_EMPLOYE'])
        ->setDateCreation(new \DateTimeImmutable());
      $manager->persist($employe);
      $this->addReference('empl-' . $this->counter, $employe);
      $this->counter++;
    }
    $manager->flush();
  }
}
