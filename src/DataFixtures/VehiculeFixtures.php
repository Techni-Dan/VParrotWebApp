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

/**
 * Fixture class for populating the database with Vehicule entities.
 */
class VehiculeFixtures extends Fixture implements DependentFixtureInterface
{
  private $counter = 1;

  /**
   * Load method to create and persist Vehicule entities using Faker for randomized data.
   *
   * @param ObjectManager $manager The entity manager
   *
   * @return void
   */
  public function load(ObjectManager $manager): void
  {
    $faker = Factory::create('fr_FR');

    for ($i = 0; $i < 800; $i++) {
      // Create a new Vehicule entity
      $vehicule = new Vehicule();
      $vehicule->setPrix($faker->numberBetween(1000, 4000000));
      $vehicule->setAnnee($faker->numberBetween(1980, 2024));
      $vehicule->setKilometrage($faker->numberBetween(1000, 300000));
      $vehicule->setDescription($faker->text);
      $vehicule->setOptions($faker->text);
      $vehicule->setDateAjout(new \DateTime());
      $vehicule->setTitre($faker->word);

      // Set the Marque for the Vehicule using a random Marque reference
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

      // Set other associations and properties for Vehicule
      $categorie = $this->getReference('cat-' . rand(1, 4));
      $vehicule->setCategorie($categorie);

      $carburant = $this->getReference('carb-' . rand(1, 6));
      $vehicule->setCarburant($carburant);

      $type = $this->getReference('type-' . rand(1, 12));
      $vehicule->setType($type);

      $employe = $this->getReference('empl-' . rand(1, 10));
      $vehicule->addEmploye($employe);

      // Persist the Vehicule entity
      $manager->persist($vehicule);
      $this->addReference('veh-' . $this->counter, $vehicule);
      $this->counter++;
    }

    // Flush the changes to the database
    $manager->flush();
  }

  /**
   * Get the dependencies for this fixture (other fixtures that should be loaded first).
   *
   * @return array
   */
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

  /**
   * Get a random Modele reference for a given Marque.
   *
   * @param object      $marque  The Marque entity
   * @param ObjectManager $manager The entity manager
   *
   * @return string The reference key for a random Modele
   */
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

  /**
   * Get references by a given prefix.
   *
   * @param ObjectManager $manager The entity manager
   * @param string        $prefix  The reference prefix
   *
   * @return array The array of references matching the given prefix
   */
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

  /**
   * Get the reference key for the given entity.
   *
   * @param object $reference The entity for which the reference key is generated
   *
   * @return string The reference key
   */
  private function getReferenceKey($reference)
  {
    // Create a ReflectionClass instance for the given entity
    $reflClass = new \ReflectionClass($reference);

    // Assuming Marque is the owning side of the relationship, get the Marque ID
    $marqueId = $reference->getMarque()->getId();

    // Generate the reference key in the format "mod-$marqueId-<EntityId>"
    return "mod-$marqueId-" . $reference->getId();
  }
}
