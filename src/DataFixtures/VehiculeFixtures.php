<?php

namespace App\DataFixtures;

use App\DataFixtures\EmployesFixtures;
use App\Entity\Modele;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Vehicule;
use App\Entity\VehiculeImage;
use App\Repository\ModeleRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class VehiculeFixtures extends Fixture implements DependentFixtureInterface
{
  private $counter = 1;

  public function load(ObjectManager $manager): void
  {
    $faker = Factory::create('fr_FR');

    for ($i = 0; $i < 800; $i++) {
      $vehicule = new Vehicule();
      $vehicule->setPrix($faker->numberBetween(1000, 4000000));
      $vehicule->setAnnee($faker->numberBetween(1980, 2024));
      $vehicule->setKilometrage($faker->numberBetween(1000, 300000));
      $vehicule->setDescription($faker->text);
      $vehicule->setOptions($faker->text);
      $vehicule->setDateAjout(new \DateTime());
      $vehicule->setTitre($faker->word);

      $marque = $this->getReference('mar-' . rand(1, 120)); // Use rand() to get a random marque reference

      $vehicule->setMarque($marque);

      // Add debugging statement
      //var_dump("Marque ID & Marque : " . $marque->getId() . " " . $marque);

      // Get a random modele reference from the marque
      $modeleReference = $this->getRandomModeleReferenceForMarque($marque, $manager);


      //var_dump("Modele Reference: " . $modeleReference);

      // Get the Modele entity using the reference
      $modele = $this->getReference($modeleReference);

      // Add another debugging statement
      //var_dump("Modele ID: " . $modele->getId());

      // Set the modele for the vehicule
      $vehicule->setModele($modele);


      $categorie = $this->getReference('cat-' . rand(1, 4));
      $vehicule->setCategorie($categorie);

      $carburant = $this->getReference('carb-' . rand(1, 6));
      $vehicule->setCarburant($carburant);

      $type = $this->getReference('type-' . rand(1, 12));
      $vehicule->setType($type);

      $employe = $this->getReference('empl-' . rand(1, 10));
      $vehicule->addEmploye($employe);

      $manager->persist($vehicule);
      $this->addReference('veh-' . $this->counter, $vehicule);
      $this->counter++;
    }

    $manager->flush();
  }

  public function getDependencies(): array
  {
    return [
      MarqueFixtures::class,
      ModeleFixtures::class,
      CarburantFixtures::class,
      CategorieFixtures::class,
      TypeFixtures::class,
      EmployesFixtures::class,
    ];
  }

  private function getRandomModeleReferenceForMarque($marque, $manager)
{
    $marqueId = $marque->getId();
    //var_dump("Marque ID: " . $marqueId);
    $matchingModeleReferences = $this->getReferencesByPrefix($manager, "mod-$marqueId-");
    if (empty($matchingModeleReferences)) {
        throw new \RuntimeException("No matching modele references found for marque with ID $marqueId");
    }

    return $matchingModeleReferences[array_rand($matchingModeleReferences)];
}

  private function getReferencesByPrefix($manager, $prefix)
  {
    $references = [];
    $referenceRepository = $manager->getRepository(Modele::class);

    foreach ($referenceRepository->findAll() as $reference) {
      $key = $this->getReferenceKey($reference);
      //var_dump("Reference key Marque ID:" . $key);
      if (strpos($key, $prefix) === 0) {
        $references[] = $key;
      }
    }

    return $references;
  }

  private function getReferenceKey($reference)
  {
      $reflClass = new \ReflectionClass($reference);
      $marqueId = $reference->getMarque()->getId(); // Assuming Marque is the owning side of the relationship
      return "mod-$marqueId-" . $reference->getId();
  }
}
