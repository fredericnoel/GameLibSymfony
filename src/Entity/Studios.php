<?php

namespace App\Entity;

use App\Repository\StudiosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudiosRepository::class)]
class Studios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nameStudio;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $countryStudio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameStudio(): ?string
    {
        return $this->nameStudio;
    }

    public function setNameStudio(string $nameStudio): self
    {
        $this->nameStudio = $nameStudio;

        return $this;
    }

    public function getCountryStudio(): ?string
    {
        return $this->countryStudio;
    }

    public function setCountryStudio(?string $countryStudio): self
    {
        $this->countryStudio = $countryStudio;

        return $this;
    }
}
