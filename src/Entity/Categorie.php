<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titrecategorie = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: AudioFile::class)]
    private Collection $audioFiles;

    public function __construct()
    {
        $this->audioFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitrecategorie(): ?string
    {
        return $this->titrecategorie;
    }

    public function setTitrecategorie(string $titrecategorie): self
    {
        $this->titrecategorie = $titrecategorie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, AudioFile>
     */
    public function getAudioFiles(): Collection
    {
        return $this->audioFiles;
    }

    public function addAudioFile(AudioFile $audioFile): self
    {
        if (!$this->audioFiles->contains($audioFile)) {
            $this->audioFiles->add($audioFile);
            $audioFile->setCategorie($this);
        }

        return $this;
    }

    public function removeAudioFile(AudioFile $audioFile): self
    {
        if ($this->audioFiles->removeElement($audioFile)) {
            // set the owning side to null (unless already changed)
            if ($audioFile->getCategorie() === $this) {
                $audioFile->setCategorie(null);
            }
        }

        return $this;
    }
}
