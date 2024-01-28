<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
#[Vich\Uploadable]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["getVehicules"])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["getVehicules"])]
    private ?Marque $marque = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["getVehicules"])]
    private ?Modele $modele = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getVehicules"])]
    private ?string $titre = null;

    #[ORM\Column]
    #[Groups(["getVehicules"])]
    #[Assert\Regex(
        pattern: "/[0-9]/",
        match: true,
        message: 'Le prix ne peut pas contenir des lettres et/ou des caractères spéciaux',
    )]
    private ?int $prix = null;

    #[ORM\Column]
    #[Groups(["getVehicules"])]
    private ?int $annee = null;

    #[ORM\Column]
    #[Groups(["getVehicules"])]
    private ?int $kilometrage = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(["getVehicules"])]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(["getVehicules"])]
    private ?string $options = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["getVehicules"])]
    private ?Categorie $categorie = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["getVehicules"])]
    private ?Type $type = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(["getVehicules"])]
    private ?Carburant $carburant = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(["getVehicules"])]
    private ?\DateTimeInterface $Date_Ajout = null;
    
    #[ORM\ManyToMany(targetEntity: Employes::class, inversedBy: 'vehicules')]
    #[Groups(["getVehicules"])]
    private Collection $employe;

    #[ORM\OneToMany(mappedBy: 'vehicule', targetEntity: VehiculeImage::class, cascade: ['persist'], orphanRemoval: true)]
    #[Groups(["getVehicules"])]
    private Collection $images;

    

    public function __construct()
    {
        $this->Date_Ajout = new \DateTime();
        $this->employe = new ArrayCollection();
        $this->images = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getModele();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(?string $options): static
    {
        $this->options = $options;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getCarburant(): ?Carburant
    {
        return $this->carburant;
    }

    public function setCarburant(?Carburant $carburant): static
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->Date_Ajout;
    }

    public function setDateAjout(\DateTimeInterface $Date_Ajout): static
    {
        $this->Date_Ajout = $Date_Ajout;

        return $this;
    }

    public function getModele(): ?Modele
    {
        return $this->modele;
    }

    public function setModele(?Modele $modele): static
    {
        $this->modele = $modele;

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
        }

        return $this;
    }

    public function removeEmploye(Employes $employe): static
    {
        $this->employe->removeElement($employe);

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * @return Collection<int, VehiculeImage>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(VehiculeImage $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setVehicule($this);
        }

        return $this;
    }

    public function removeImage(VehiculeImage $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getVehicule() === $this) {
                $image->setVehicule(null);
            }
        }

        return $this;
    }
}
