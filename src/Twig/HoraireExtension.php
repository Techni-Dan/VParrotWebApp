<?php
namespace App\Twig;

use Twig\TwigFunction;
use App\Entity\Horaire;
use Twig\Extension\AbstractExtension;
use Doctrine\ORM\EntityManagerInterface;

class HoraireExtension extends AbstractExtension
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('horaire', [$this, 'getHoraire'])
        ];
    }

    public function getHoraire()
    {
        return $this->em->getRepository(Horaire::class)->findAll();
    }
}