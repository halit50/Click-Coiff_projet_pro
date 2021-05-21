<?php

namespace App\Entity;

use App\Repository\PrendreRdvRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PrendreRdvRepository::class)
 */
class PrendreRdv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotNull(message = "Veuillez sélectionner une date")
     * @Assert\GreaterThan("today UTC")
     */
    private $daterdv;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="prendreRdvs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Adresses::class, inversedBy="prendreRdvs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotNull(message = "Veuillez sélectionner une heure")
     */
    private $heures;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDaterdv(): ?\DateTimeInterface
    {
        return $this->daterdv;
    }

    public function setDaterdv(?\DateTimeInterface $daterdv): self
    {
        $this->daterdv = $daterdv;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAdresse(): ?Adresses
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresses $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getHeures(): ?string
    {
        return $this->heures;
    }

    public function setHeures(string $heures): self
    {
        $this->heures = $heures;

        return $this;
    }
}
