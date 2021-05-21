<?php

namespace App\Entity;

use App\Repository\PrestationServicesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationServicesRepository::class)
 */
class PrestationServices
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
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToMany(targetEntity=Enseigne::class, inversedBy="prestationServices")
     */
    private $enseigne;

    public function __construct()
    {
        $this->enseigne = new ArrayCollection();
    }
    public function __toString(){
        return $this->getnom();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

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
