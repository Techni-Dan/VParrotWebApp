<?php

namespace App\Entity;

use App\Repository\EmployesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\PasswordStrength;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(["getVehicules"])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    //#[Groups(["getVehicules"])]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z '.-]*[A-Za-z][^-]$/",
        match: true,
        message: 'Votre nom ne peut pas contenir des nombres et/ou des caractères spéciaux',
    )]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    #[Groups(["getVehicules"])]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z '.-]*[A-Za-z][^-]$/",
        match: true,
        message: 'Votre prenom ne peut pas contenir des nombres et/ou des caractères spéciaux',
    )]
    private ?string $prenom = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Groups(["getVehicules"])]
    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = ["ROLE_EMPLOYE"];

    #[ORM\Column]
    #[Groups(["getVehicules"])]
    private ?\DateTimeImmutable $DateCreation = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    /*#[Assert\PasswordStrength([
        'minScore' => PasswordStrength::STRENGTH_STRONG,
    ])]*/
    #[Assert\Regex(
        pattern: '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/',
        message: 'Password must be at least 8 characters long and include at least one uppercase letter, one digit, and one special character.'
    )]
    private ?string $password = null;

    #[ORM\ManyToMany(targetEntity: Vehicule::class, mappedBy: 'employe')]
    private Collection $vehicules;

    #[ORM\ManyToMany(targetEntity: Temoignage::class, mappedBy: 'employe')]
    private Collection $temoignages;

    public function __construct()
    {
        $this->DateCreation = new \DateTimeImmutable();
        $this->vehicules = new ArrayCollection();
        $this->temoignages = new ArrayCollection();
    }
    
    public function __toString(): string
    {
        //return $this->getPrenom(). ' - '. $this->getNom();
        return $this->getEmail();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        //$roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeImmutable $DateCreation): static
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): static
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules->add($vehicule);
            $vehicule->addEmploye($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): static
    {
        if ($this->vehicules->removeElement($vehicule)) {
            $vehicule->removeEmploye($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Temoignage>
     */
    public function getTemoignages(): Collection
    {
        return $this->temoignages;
    }

    public function addTemoignage(Temoignage $temoignage): static
    {
        if (!$this->temoignages->contains($temoignage)) {
            $this->temoignages->add($temoignage);
            $temoignage->addEmploye($this);
        }

        return $this;
    }

    public function removeTemoignage(Temoignage $temoignage): static
    {
        if ($this->temoignages->removeElement($temoignage)) {
            $temoignage->removeEmploye($this);
        }

        return $this;
    }
}
