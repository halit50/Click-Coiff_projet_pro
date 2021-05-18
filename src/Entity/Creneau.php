<?php

namespace App\Entity;

use App\Repository\CreneauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreneauRepository::class)
 */
class Creneau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $periodicite;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heuredebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heurefin;

    /**
     * @ORM\ManyToMany(targetEntity=Enseigne::class, inversedBy="creneaus")
     */
    private $enseigne;

    public function __construct()
    {
        $this->enseigne = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriodicite(): ?string
    {
        return $this->periodicite;
    }

    public function setPeriodicite(string $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    public function getHeuredebut(): ?\DateTimeInterface
    {
        return $this->heuredebut;
    }

    public function setHeuredebut(\DateTimeInterface $heuredebut): self
    {
        $this->heuredebut = $heuredebut;

        return $this;
    }

    public function getHeurefin(): ?\DateTimeInterface
    {
        return $this->heurefin;
    }

    public function setHeurefin(\DateTimeInterface $heurefin): self
    {
        $this->heurefin = $heurefin;

        return $this;
    }

    /**
     * @return Collection|Enseigne[]
     */
    public function getEnseigne(): Collection
    {
        return $this->enseigne;
    }

    public function addEnseigne(Enseigne $enseigne): self
    {
        if (!$this->enseigne->contains($enseigne)) {
            $this->enseigne[] = $enseigne;
        }

        return $this;
    }

    public function removeEnseigne(Enseigne $enseigne): self
    {
        $this->enseigne->removeElement($enseigne);

        return $this;
    }
}
