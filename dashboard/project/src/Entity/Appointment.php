<?php

namespace App\Entity;

use App\Enum\Status;
use App\Enum\Type;
use App\Repository\AppointmentRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppointmentRepository::class)]
class Appointment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(enumType: Type::class)]
    private ?Type $type = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $animal = null;

    #[ORM\Column(enumType: Status::class)]
    private ?Status $status = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $submittedDate = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $wantedDate = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: true)]
    private ?AnimalFolder $animalFolderId = null;

    #[ORM\ManyToOne(inversedBy: 'requests')]
    private ?User $veterinaryId = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column]
    private ?int $phoneNumber = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(Type $type): static
    {
        $this->type = $type;

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

    public function getAnimal(): ?string
    {
        return $this->animal;
    }

    public function setAnimal(string $animal): static
    {
        $this->animal = $animal;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(Status $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getSubmittedDate(): ?\DateTime
    {
        return $this->submittedDate;
    }

    public function setSubmittedDate(\DateTime $submittedDate): static
    {
        $this->submittedDate = $submittedDate;

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

    public function getWantedDate(): ?\DateTime
    {
        return $this->wantedDate;
    }

    public function setWantedDate(\DateTime $wantedDate): static
    {
        $this->wantedDate = $wantedDate;

        return $this;
    }

    public function getAnimalFolderId(): ?AnimalFolder
    {
        return $this->animalFolderId;
    }

    public function setAnimalFolderId(?AnimalFolder $animalFolderId): static
    {
        $this->animalFolderId = $animalFolderId;

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(int $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }
    public function __construct()
    {
        $this->submittedDate = new DateTime();
    }
}
