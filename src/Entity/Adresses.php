<?php

namespace App\Entity;

use App\Repository\AdressesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AdressesRepository::class)
 */
class Adresses
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
    private $rue;

    /**
     * @Assert\Length(
     *      min = 5,
     *      max = 5,
     *      minMessage = "Votre Code Postal doit contenir au minimum 5 caractères",
     *      maxMessage = "Votre Code Postal doit contenir au maximum 5 caractères"
     * )
     * @ORM\Column(type="string")
     */
    private $codePostal;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre Ville doit contenir au minimum 2 caractères",
     *      maxMessage = "Votre Ville doit contenir au maximum 50 caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre Pays doit contenir au minimum 2 caractères",
     *      maxMessage = "Votre Pays doit contenir au maximum 50 caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $pays;

    /**
     * @ORM\OneToOne(targetEntity=Enseigne::class, inversedBy="adresses", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $enseigne;

    /**
     * @ORM\OneToMany(targetEntity=PrendreRdv::class, mappedBy="adresse")
     */
    private $prendreRdvs;


    public function __construct()
    {
        $this->prendreRdvs = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
    }

    public function __toString(){
        return $this->getRue().' <br> '.$this->getCodePostal().' - '.$this->getVille().' <br> '.$this->getPays();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getEnseigne(): ?Enseigne
    {
        return $this->enseigne;
    }

    public function setEnseigne(Enseigne $enseigne): self
    {
        $this->enseigne = $enseigne;

        return $this;
    }

    /**
     * @return Collection|PrendreRdv[]
     */
    public function getPrendreRdvs(): Collection
    {
        return $this->prendreRdvs;
    }

    public function addPrendreRdv(PrendreRdv $prendreRdv): self
    {
        if (!$this->prendreRdvs->contains($prendreRdv)) {
            $this->prendreRdvs[] = $prendreRdv;
            $prendreRdv->setAdresse($this);
        }

        return $this;
    }

    public function removePrendreRdv(PrendreRdv $prendreRdv): self
    {
        if ($this->prendreRdvs->removeElement($prendreRdv)) {
            // set the owning side to null (unless already changed)
            if ($prendreRdv->getAdresse() === $this) {
                $prendreRdv->setAdresse(null);
            }
        }

        return $this;
    }

}
