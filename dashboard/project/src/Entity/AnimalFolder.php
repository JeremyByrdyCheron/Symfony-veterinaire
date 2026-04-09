<?php

namespace App\Entity;

use App\Repository\AnimalFolderRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalFolderRepository::class)]
class AnimalFolder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $inscriptionDate = null;

    #[ORM\ManyToOne(inversedBy: 'animalFolders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $veterinaryId = null;

    #[ORM\Column(length: 255)]
    private ?string $animal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getInscriptionDate(): ?\DateTime
    {
        return $this->inscriptionDate;
    }

    public function setInscriptionDate(\DateTime $inscriptionDate): static
    {
        $this->inscriptionDate = $inscriptionDate;

        return $this;
    }

    public function getVeterinaryId(): ?User
    {
        return $this->veterinaryId;
    }

    public function setVeterinaryId(?User $veterinaryId): static
    {
        $this->veterinaryId = $veterinaryId;

        return $this;
    }
    public function __construct()
    {
        $this->inscriptionDate = new DateTime();
    }

    public function getAnimal(): ?string
    {
        return $this->animal;
    }

    public function setAnimal(string $animal): static
    {
        $this->animal = $animal;

        return $this;
    }
}
