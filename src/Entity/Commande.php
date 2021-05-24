<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomtransporteur;

    /**
     * @ORM\Column(type="float")
     */
    private $prixtransporteur;

    /**
     * @ORM\Column(type="text")
     */
    private $liraison;

    /**
     * @ORM\Column(type="integer")
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=DetailCommande::class, mappedBy="commande", orphanRemoval=true)
     */
    private $detailCommandes;

    public function __construct()
    {
        $this->detailCommandes = new ArrayCollection();
    }

    public function getTotal()
    {
        $total = null;
        foreach ($this->getDetailCommandes()->getValues() as $produit) {
            $total = $total + ($produit->getPrix() * $produit->getQuantite());
        }

        return $total;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getNomtransporteur(): ?string
    {
        return $this->nomtransporteur;
    }

    public function setNomtransporteur(string $nomtransporteur): self
    {
        $this->nomtransporteur = $nomtransporteur;

        return $this;
    }

    public function getPrixtransporteur(): ?float
    {
        return $this->prixtransporteur;
    }

    public function setPrixtransporteur(float $prixtransporteur): self
    {
        $this->prixtransporteur = $prixtransporteur;

        return $this;
    }

    public function getLiraison(): ?string
    {
        return $this->liraison;
    }

    public function setLiraison(string $liraison): self
    {
        $this->liraison = $liraison;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

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

    /**
     * @return Collection|DetailCommande[]
     */
    public function getDetailCommandes(): Collection
    {
        return $this->detailCommandes;
    }

    public function addDetailCommande(DetailCommande $detailCommande): self
    {
        if (!$this->detailCommandes->contains($detailCommande)) {
            $this->detailCommandes[] = $detailCommande;
            $detailCommande->setCommande($this);
        }

        return $this;
    }

    public function removeDetailCommande(DetailCommande $detailCommande): self
    {
        if ($this->detailCommandes->removeElement($detailCommande)) {
            // set the owning side to null (unless already changed)
            if ($detailCommande->getCommande() === $this) {
                $detailCommande->setCommande(null);
            }
        }

        return $this;
    }
}
