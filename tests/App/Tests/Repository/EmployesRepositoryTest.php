<?php

namespace App\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EmployesRepositoryTest extends KernelTestCase
{
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        // Get the entity manager
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testCount()
    {
        // Replace 'App\Entity\Employes' with the actual entity class you're testing
        $repository = $this->entityManager->getRepository('App\Entity\Employes');

        // Perform any setup needed for the test (e.g., load fixtures, create entities)

        // Your test logic
        $employesCount = $repository->count([]);

        $this->assertEquals(10, $employesCount);
    }
}
