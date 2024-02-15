<?php

namespace App\Entity;

use App\Repository\UsedautoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsedautoRepository::class)]
class Usedauto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $mileage = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $yearofregistration = null;

    #[ORM\OneToMany(targetEntity: Picture::class, mappedBy: 'usedauto')]
    private Collection $pictures;

    #[ORM\OneToMany(targetEntity: Customertestimonial::class, mappedBy: 'usedauto')]
    private Collection $customertestimonials;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
        $this->customertestimonials = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getMileage(): ?string
    {
        return $this->mileage;
    }

    public function setMileage(string $mileage): static
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getYearofregistration(): ?\DateTimeInterface
    {
        return $this->yearofregistration;
    }

    public function setYearofregistration(\DateTimeInterface $yearofregistration): static
    {
        $this->yearofregistration = $yearofregistration;

        return $this;
    }

    /**
     * @return Collection<int, Picture>
     */
    public function getPictures(): Collection
    {
        return $this->pictures;
    }

    public function addPicture(Picture $picture): static
    {
        if (!$this->pictures->contains($picture)) {
            $this->pictures->add($picture);
            $picture->setUsedauto($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): static
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getUsedauto() === $this) {
                $picture->setUsedauto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Customertestimonial>
     */
    public function getCustomertestimonials(): Collection
    {
        return $this->customertestimonials;
    }

    public function addCustomertestimonial(Customertestimonial $customertestimonial): static
    {
        if (!$this->customertestimonials->contains($customertestimonial)) {
            $this->customertestimonials->add($customertestimonial);
            $customertestimonial->setUsedauto($this);
        }

        return $this;
    }

    public function removeCustomertestimonial(Customertestimonial $customertestimonial): static
    {
        if ($this->customertestimonials->removeElement($customertestimonial)) {
            // set the owning side to null (unless already changed)
            if ($customertestimonial->getUsedauto() === $this) {
                $customertestimonial->setUsedauto(null);
            }
        }

        return $this;
    }

}
