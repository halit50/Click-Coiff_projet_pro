<?php

namespace App\Entity;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EnseigneRepository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EnseigneRepository::class)
 */
class Enseigne
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
     * @Assert\Length(
     *      min = 9,
     *      max = 9,
     *      minMessage = "Votre numéro de SIREN doit contenir exactement {{ limit }} caractères",
     *      maxMessage = "Votre numéro de SIREN doit contenir exactement {{ limit }}caractères"
     * )
     * @ORM\Column(type="float")
     */
    private $kbis;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $reseausocial;

    /**
     * @ORM\OneToOne(targetEntity=user::class, inversedBy="enseigne", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $typeCoiffeur;

    /**
     * @ORM\OneToOne(targetEntity=Adresses::class, mappedBy="enseigne", cascade={"persist", "remove"})
     */
    private $adresses;

    /**
     * @ORM\ManyToMany(targetEntity=Creneau::class, mappedBy="enseigne")
     */
    private $creneaus;

    
    /**
     * @ORM\OneToMany(targetEntity=PrestationServices::class, mappedBy="enseigne")
     */
    private $prestationServices;

    /**
     * @ORM\OneToMany(targetEntity=Fichier::class, mappedBy="enseigne")
     */
    private $fichiers;


    public function __construct()
    {
        $this->creneaus = new ArrayCollection();
        $this->prestationServices = new ArrayCollection();
        $this->fichiers = new ArrayCollection();
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

    public function getKbis(): ?float
    {
        return $this->kbis;
    }

    public function setKbis(float $kbis): self
    {
        $this->kbis = $kbis;

        return $this;
    }

    public function getReseausocial(): ?string
    {
        return $this->reseausocial;
    }

    public function setReseausocial(?string $reseausocial): self
    {
        $this->reseausocial = $reseausocial;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTypeCoiffeur(): ?string
    {
        return $this->typeCoiffeur;
    }

    public function setTypeCoiffeur(string $typeCoiffeur): self
    {
        $this->typeCoiffeur = $typeCoiffeur;

        return $this;
    }

    public function getAdresses(): ?Adresses
    {
        return $this->adresses;
    }

    public function setAdresses(Adresses $adresses): self
    {
        // set the owning side of the relation if necessary
        if ($adresses->getEnseigne() !== $this) {
            $adresses->setEnseigne($this);
        }

        $this->adresses = $adresses;

        return $this;
    }

    /**
     * @return Collection|Creneau[]
     */
    public function getCreneaus(): Collection
    {
        return $this->creneaus;
    }

    public function addCreneau(Creneau $creneau): self
    {
        if (!$this->creneaus->contains($creneau)) {
            $this->creneaus[] = $creneau;
            $creneau->addEnseigne($this);
        }

        return $this;
    }

    public function removeCreneau(Creneau $creneau): self
    {
        if ($this->creneaus->removeElement($creneau)) {
            $creneau->removeEnseigne($this);
        }

        return $this;
    }

    /**
     * @return Collection|PrestationServices[]
     */
    public function getPrestationServices(): Collection
    {
        return $this->prestationServices;
    }

    public function addPrestationService(PrestationServices $prestationService): self
    {
        if (!$this->prestationServices->contains($prestationService)) {
            $this->prestationServices[] = $prestationService;
            $prestationService->setEnseigne($this);
        }

        return $this;
    }

    public function removePrestationService(PrestationServices $prestationService): self
    {
        if ($this->prestationServices->removeElement($prestationService)) {
            // set the owning side to null (unless already changed)
            if ($prestationService->getEnseigne() === $this) {
                $prestationService->setEnseigne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Fichier[]
     */
    public function getFichiers(): Collection
    {
        return $this->fichiers;
    }

    public function addFichier(Fichier $fichier): self
    {
        if (!$this->fichiers->contains($fichier)) {
            $this->fichiers[] = $fichier;
            $fichier->setEnseigne($this);
        }

        return $this;
    }

    public function removeFichier(Fichier $fichier): self
    {
        if ($this->fichiers->removeElement($fichier)) {
            // set the owning side to null (unless already changed)
            if ($fichier->getEnseigne() === $this) {
                $fichier->setEnseigne(null);
            }
        }

        return $this;
    }
   
    
}
