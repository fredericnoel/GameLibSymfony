<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamesRepository::class)]
class Games
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $titleGame;

    #[ORM\Column(type: 'date')]
    private $releaseDateGame;

    #[ORM\Column(type: 'text')]
    private $descriptionGame;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleGame(): ?string
    {
        return $this->titleGame;
    }

    public function setTitleGame(string $titleGame): self
    {
        $this->titleGame = $titleGame;

        return $this;
    }

    public function getReleaseDateGame(): ?\DateTimeInterface
    {
        return $this->releaseDateGame;
    }

    public function setReleaseDateGame(\DateTimeInterface $releaseDateGame): self
    {
        $this->releaseDateGame = $releaseDateGame;

        return $this;
    }

    public function getDescriptionGame(): ?string
    {
        return $this->descriptionGame;
    }

    public function setDescriptionGame(string $descriptionGame): self
    {
        $this->descriptionGame = $descriptionGame;

        return $this;
    }
}
