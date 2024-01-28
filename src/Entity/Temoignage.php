<?php

namespace App\Entity;

use App\Repository\TemoignageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TemoignageRepository::class)]
class Temoignage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Commentaire = null;

    #[ORM\Column]
    #[Assert\Regex(
        pattern: "/[1-5]/",
        match: true,
        message: 'La note doit etre un numero entre 1 et 5',
    )]
    private ?int $Note = null;

    #[ORM\Column]
    private ?bool $Approuve = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: Employes::class, inversedBy: 'temoignages')]
    private Collection $employe;

    public function __construct()
    {
        $this->updatedAt = new \DateTimeImmutable();
        $this->employe = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(string $Commentaire): static
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): static
    {
        $this->Note = $Note;

        return $this;
    }

    public function isApprouve(): ?bool
    {
        return $this->Approuve;
    }

    public function setApprouve(bool $Approuve): static
    {
        $this->Approuve = $Approuve;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Employes>
     */
    public function getEmploye(): Collection
    {
        return $this->employe;
    }

    public function addEmploye(Employes $employe): static
    {
        if (!$this->employe->contains($employe)) {
            $this->employe->add($employe);
            $employe->addTemoignage($this);
        }

        return $this;
    }

    public function removeEmploye(Employes $employe): static
    {
        $this->employe->removeElement($employe);

        return $this;
    }
}
