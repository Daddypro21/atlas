<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use App\Repository\BenevoleRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\AttributeOverride;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: BenevoleRepository::class)]


class Benevole extends User
{
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $numberphone = null;

    #[ORM\OneToMany(mappedBy: 'benevole', targetEntity: Gift::class)]
    private Collection $gifts;

    public function __construct()
    {
        $this->roles = ["ROLE_BENEVOLE"];
        $this->gifts = new ArrayCollection();
    }

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
            $gift->setBenevole($this);
        }

        return $this;
    }

    public function removeGift(Gift $gift): self
    {
        if ($this->gifts->removeElement($gift)) {
            // set the owning side to null (unless already changed)
            if ($gift->getBenevole() === $this) {
                $gift->setBenevole(null);
            }
        }

        return $this;
    }

}
