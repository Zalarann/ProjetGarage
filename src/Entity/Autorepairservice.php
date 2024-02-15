<?php

namespace App\Entity;

use App\Repository\AutorepairserviceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AutorepairserviceRepository::class)]
class Autorepairservice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 64)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(targetEntity: Customertestimonial::class, mappedBy: 'autorepairservice')]
    private Collection $customertestimonials;

    public function __construct()
    {
        $this->customertestimonials = new ArrayCollection();
    }


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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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
            $customertestimonial->setAutorepairservice($this);
        }

        return $this;
    }

    public function removeCustomertestimonial(Customertestimonial $customertestimonial): static
    {
        if ($this->customertestimonials->removeElement($customertestimonial)) {
            // set the owning side to null (unless already changed)
            if ($customertestimonial->getAutorepairservice() === $this) {
                $customertestimonial->setAutorepairservice(null);
            }
        }

        return $this;
    }

}
