<?php

namespace App\Entity;

use App\Repository\GarageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GarageRepository::class)]
class Garage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $name = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatedat = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $amopeningtime = [];

    #[ORM\Column(type: Types::ARRAY)]
    private array $pmopeningtime = [];

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Owner = null;

    #[ORM\OneToMany(targetEntity: Picture::class, mappedBy: 'garage')]
    private Collection $pictures;

    public function __construct()
    {
        $this->pictures = new ArrayCollection();
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

    public function getCreateat(): ?\DateTimeInterface
    {
        return $this->createat;
    }

    public function setCreateat(\DateTimeInterface $createat): static
    {
        $this->createat = $createat;

        return $this;
    }

    public function getUpdatedat(): ?\DateTimeInterface
    {
        return $this->updatedat;
    }

    public function setUpdatedat(?\DateTimeInterface $updatedat): static
    {
        $this->updatedat = $updatedat;

        return $this;
    }

    public function getAmopeningtime(): array
    {
        return $this->amopeningtime;
    }

    public function setAmopeningtime(array $amopeningtime): static
    {
        $this->amopeningtime = $amopeningtime;

        return $this;
    }

    public function getPmopeningtime(): array
    {
        return $this->pmopeningtime;
    }

    public function setPmopeningtime(array $pmopeningtime): static
    {
        $this->pmopeningtime = $pmopeningtime;

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

    public function getOwner(): ?User
    {
        return $this->Owner;
    }

    public function setOwner(User $Owner): static
    {
        $this->Owner = $Owner;

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
            $picture->setGarage($this);
        }

        return $this;
    }

    public function removePicture(Picture $picture): static
    {
        if ($this->pictures->removeElement($picture)) {
            // set the owning side to null (unless already changed)
            if ($picture->getGarage() === $this) {
                $picture->setGarage(null);
            }
        }

        return $this;
    }
}
