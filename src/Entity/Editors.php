<?php

namespace App\Entity;

use App\Repository\EditorsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EditorsRepository::class)]
class Editors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameEditor;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $countryEditor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameEditor(): ?string
    {
        return $this->nameEditor;
    }

    public function setNameEditor(string $nameEditor): self
    {
        $this->nameEditor = $nameEditor;

        return $this;
    }

    public function getCountryEditor(): ?string
    {
        return $this->countryEditor;
    }

    public function setCountryEditor(?string $countryEditor): self
    {
        $this->countryEditor = $countryEditor;

        return $this;
    }
}
