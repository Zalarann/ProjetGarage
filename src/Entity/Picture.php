<?php

namespace App\Entity;

use App\Repository\PictureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PictureRepository::class)]
class Picture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 128)]
    private ?string $title = null;

    #[ORM\Column(length: 128)]
    private ?string $slug = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createat = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updateat = null;

    #[ORM\ManyToOne(inversedBy: 'pictures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usedauto $usedauto = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

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

    public function getUpdateat(): ?\DateTimeInterface
    {
        return $this->updateat;
    }

    public function setUpdateat(?\DateTimeInterface $updateat): static
    {
        $this->updateat = $updateat;

        return $this;
    }

    public function getUsedauto(): ?Usedauto
    {
        return $this->usedauto;
    }

    public function setUsedauto(?Usedauto $usedauto): static
    {
        $this->usedauto = $usedauto;

        return $this;
    }

}
