<?php

namespace App\Entity;

use App\Repository\PodcastRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PodcastRepository::class)]
class Podcast
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titrepodcast = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionPodcast = null;

    #[ORM\Column]
    private ?int $duree = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrepodcast(): ?string
    {
        return $this->titrepodcast;
    }

    public function setTitrepodcast(string $titrepodcast): self
    {
        $this->titrepodcast = $titrepodcast;

        return $this;
    }

    public function getDescriptionPodcast(): ?string
    {
        return $this->descriptionPodcast;
    }

    public function setDescriptionPodcast(string $descriptionPodcast): self
    {
        $this->descriptionPodcast = $descriptionPodcast;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
