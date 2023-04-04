<?php

namespace App\Entity;

use App\Repository\BenevoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BenevoleRepository::class)]
class Benevole extends User
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
    private ?string $numberphone = null;

    public function __construct()
    {
        $this->roles = ["ROLE_BENEVOLE"];
    }
    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getNumberphone(): ?string
    {
        return $this->numberphone;
    }

    public function setNumberphone(string $numberphone): self
    {
        $this->numberphone = $numberphone;

        return $this;
    }

}
