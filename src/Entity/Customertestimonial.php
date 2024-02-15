<?php

namespace App\Entity;

use App\Repository\CustomertestimonialRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomertestimonialRepository::class)]
class Customertestimonial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $isvalidated = null;

    #[ORM\Column(length: 64)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $comment = null;

    #[ORM\ManyToOne(inversedBy: 'customertestimonials')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Autorepairservice $autorepaireservice = null;

    #[ORM\ManyToOne(inversedBy: 'customertestimonials')]
    private ?Autorepairservice $autorepairservice = null;

    #[ORM\ManyToOne(inversedBy: 'customertestimonials')]
    private ?Usedauto $usedauto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsvalidated(): ?bool
    {
        return $this->isvalidated;
    }

    public function setIsvalidated(bool $isvalidated): static
    {
        $this->isvalidated = $isvalidated;

        return $this;
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

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): static
    {
        $this->note = $note;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function getAutorepaireservice(): ?Autorepairservice
    {
        return $this->autorepaireservice;
    }

    public function setAutorepaireservice(?Autorepairservice $autorepaireservice): static
    {
        $this->autorepaireservice = $autorepaireservice;

        return $this;
    }

    public function getAutorepairservice(): ?Autorepairservice
    {
        return $this->autorepairservice;
    }

    public function setAutorepairservice(?Autorepairservice $autorepairservice): static
    {
        $this->autorepairservice = $autorepairservice;

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
