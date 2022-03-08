<?php

namespace App\Entity;

use App\Repository\PlatformsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlatformsRepository::class)]
class Platforms
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $modelName;

    #[ORM\Column(type: 'string', length: 255)]
    private $modelRef;

    #[ORM\ManyToOne(targetEntity: Manufacturers::class)]
    private $id_manufacturer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModelName(): ?string
    {
        return $this->modelName;
    }

    public function setModelName(string $manufacturerPlatform): self
    {
        $this->manufacturerPlatform = $manufacturerPlatform;

        return $this;
    }

    public function getModelRef(): ?string
    {
        return $this->modelRef;
    }

    public function setModelRef(string $modelRef): self
    {
        $this->modelRef = $modelRef;

        return $this;
    }

    public function getIdManufacturer(): ?Manufacturers
    {
        return $this->id_manufacturer;
    }

    public function setIdManufacturer(?Manufacturers $id_manufacturer): self
    {
        $this->id_manufacturer = $id_manufacturer;

        return $this;
    }
}
