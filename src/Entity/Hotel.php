<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping\Column;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\AttributeOverride;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]

class Hotel extends User
{

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    private ?string $contactphone = null;

    #[ORM\Column(length: 255)]
    private ?string $managername = null;

    #[ORM\Column(length: 255)]
    private ?string $managerfirstname = null;

    #[ORM\Column(length: 255)]
    private ?string $managerphone = null;

    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: Gift::class, orphanRemoval: true)]
    private Collection $gifts;

    public function __construct()
    {
        $this->roles = ['ROLE_HOTEL'];
        $this->gifts = new ArrayCollection();
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getContactphone(): ?string
    {
        return $this->contactphone;
    }

    public function setContactphone(string $contactphone): self
    {
        $this->contactphone = $contactphone;

        return $this;
    }

    public function getManagername(): ?string
    {
        return $this->managername;
    }

    public function setManagername(string $managername): self
    {
        $this->managername = $managername;

        return $this;
    }

    public function getManagerfirstname(): ?string
    {
        return $this->managerfirstname;
    }

    public function setManagerfirstname(string $managerfirstname): self
    {
        $this->managerfirstname = $managerfirstname;

        return $this;
    }

    public function getManagerphone(): ?string
    {
        return $this->managerphone;
    }

    public function setManagerphone(string $managerphone): self
    {
        $this->managerphone = $managerphone;

        return $this;
    }

    /**
     * @return Collection<int, Gift>
     */
    public function getGifts(): Collection
    {
        return $this->gifts;
    }

    public function addGift(Gift $gift): self
    {
        if (!$this->gifts->contains($gift)) {
            $this->gifts->add($gift);
            $gift->setHotel($this);
        }

        return $this;
    }

    public function removeGift(Gift $gift): self
    {
        if ($this->gifts->removeElement($gift)) {
            // set the owning side to null (unless already changed)
            if ($gift->getHotel() === $this) {
                $gift->setHotel(null);
            }
        }

        return $this;
    }
}
