<?php

namespace App\Entity;

use App\Repository\HoraireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HoraireRepository::class)]
class Horaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $jour = null;

    #[ORM\Column(length: 40)]
    private ?string $ouverture_matin = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $fermeture_midi = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $ouverture_apres_midi = null;

    #[ORM\Column(length: 40, nullable: true)]
    private ?string $fermeture_soir = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): static
    {
        $this->jour = $jour;

        return $this;
    }

    public function getOuvertureMatin(): ?string
    {
        return $this->ouverture_matin;
    }

    public function setOuvertureMatin(string $ouverture_matin): static
    {
        $this->ouverture_matin = $ouverture_matin;

        return $this;
    }

    public function getFermetureMidi(): ?string
    {
        return $this->fermeture_midi;
    }

    public function setFermetureMidi(string $fermeture_midi): static
    {
        $this->fermeture_midi = $fermeture_midi;

        return $this;
    }

    public function getOuvertureApresMidi(): ?string
    {
        return $this->ouverture_apres_midi;
    }

    public function setOuvertureApresMidi(?string $ouverture_apres_midi): static
    {
        $this->ouverture_apres_midi = $ouverture_apres_midi;

        return $this;
    }

    public function getFermetureSoir(): ?string
    {
        return $this->fermeture_soir;
    }

    public function setFermetureSoir(?string $fermeture_soir): static
    {
        $this->fermeture_soir = $fermeture_soir;

        return $this;
    }
}
