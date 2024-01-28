<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
#[Vich\Uploadable]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description1 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description2 = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $listeitem1 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $listeitem2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $listeitem3 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $listeitem4 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $listeitem5 = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    #[Vich\UploadableField(mapping: 'services', fileNameProperty: 'imageName', size: 'imageSize')]
    private ?File $imageFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageName = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageSize = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageSize(?int $imageSize): void
    {
        $this->imageSize = $imageSize;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(?string $description1): static
    {
        $this->description1 = $description1;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(?string $description2): static
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(?string $description3): static
    {
        $this->description3 = $description3;

        return $this;
    }

    public function getListeitem1(): ?string
    {
        return $this->listeitem1;
    }

    public function setListeitem1(?string $listeitem1): static
    {
        $this->listeitem1 = $listeitem1;

        return $this;
    }

    public function getListeitem2(): ?string
    {
        return $this->listeitem2;
    }

    public function setListeitem2(?string $listeitem2): static
    {
        $this->listeitem2 = $listeitem2;

        return $this;
    }

    public function getListeitem3(): ?string
    {
        return $this->listeitem3;
    }

    public function setListeitem3(?string $listeitem3): static
    {
        $this->listeitem3 = $listeitem3;

        return $this;
    }

    public function getListeitem4(): ?string
    {
        return $this->listeitem4;
    }

    public function setListeitem4(?string $listeitem4): static
    {
        $this->listeitem4 = $listeitem4;

        return $this;
    }

    public function getListeitem5(): ?string
    {
        return $this->listeitem5;
    }

    public function setListeitem5(?string $listeitem5): static
    {
        $this->listeitem5 = $listeitem5;

        return $this;
    }
}
