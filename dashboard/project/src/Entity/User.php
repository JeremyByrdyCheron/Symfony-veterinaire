<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(type: Types::BIGINT)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    /**
     * @var Collection<int, AnimalFolder>
     */
    #[ORM\OneToMany(targetEntity: AnimalFolder::class, mappedBy: 'veterinaryId', orphanRemoval: true)]
    private Collection $animalFolders;

    public function __construct()
    {
        $this->animalFolders = new ArrayCollection();
    }

    #[ORM\Column]

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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, AnimalFolder>
     */
    public function getAnimalFolders(): Collection
    {
        return $this->animalFolders;
    }

    public function addAnimalFolder(AnimalFolder $animalFolder): static
    {
        if (!$this->animalFolders->contains($animalFolder)) {
            $this->animalFolders->add($animalFolder);
            $animalFolder->setVeterinaryId($this);
        }

        return $this;
    }

    public function removeAnimalFolder(AnimalFolder $animalFolder): static
    {
        if ($this->animalFolders->removeElement($animalFolder)) {
            // set the owning side to null (unless already changed)
            if ($animalFolder->getVeterinaryId() === $this) {
                $animalFolder->setVeterinaryId(null);
            }
        }

        return $this;
    }


}
