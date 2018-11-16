<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\SalonRepository")
 */
class Salon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gps_address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stylist", mappedBy="salon")
     */
    private $stylists;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Prestation", mappedBy="salon")
     */
    private $prestations;

    public function __construct()
    {
        $this->stylists = new ArrayCollection();
        $this->prestations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getGpsAddress(): ?string
    {
        return $this->gps_address;
    }

    public function setGpsAddress(string $gps_address): self
    {
        $this->gps_address = $gps_address;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection|Stylist[]
     */
    public function getStylists(): Collection
    {
        return $this->stylists;
    }

    public function addStylist(Stylist $stylist): self
    {
        if (!$this->stylists->contains($stylist)) {
            $this->stylists[] = $stylist;
            $stylist->setSalon($this);
        }

        return $this;
    }

    public function removeStylist(Stylist $stylist): self
    {
        if ($this->stylists->contains($stylist)) {
            $this->stylists->removeElement($stylist);
            // set the owning side to null (unless already changed)
            if ($stylist->getSalon() === $this) {
                $stylist->setSalon(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Prestation[]
     */
    public function getPrestations(): Collection
    {
        return $this->prestations;
    }

    public function addPrestation(Prestation $prestation): self
    {
        if (!$this->prestations->contains($prestation)) {
            $this->prestations[] = $prestation;
            $prestation->setSalon($this);
        }

        return $this;
    }

    public function removePrestation(Prestation $prestation): self
    {
        if ($this->prestations->contains($prestation)) {
            $this->prestations->removeElement($prestation);
            // set the owning side to null (unless already changed)
            if ($prestation->getSalon() === $this) {
                $prestation->setSalon(null);
            }
        }

        return $this;
    }
}
