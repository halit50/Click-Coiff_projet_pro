<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    public const ROLE_ADMIN = 'ROLE_ADMIN';
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre prénom doit contenir au minimum 2 caractères",
     *      maxMessage = "Votre prénom doit contenir au maximum 50 caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Votre Nom doit contenir au minimum 2 caractères",
     *      maxMessage = "Votre Nom doit contenir au maximum 50 caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $gender;

    /**
     * @Assert\Length(
     *      min = 10,
     *      max = 10,
     *      minMessage = "Votre Numéro doit contenir exactement 10 caractères",
     *      maxMessage = "Votre Numéro doit contenir exactement 10 caractères"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\OneToOne(targetEntity=Enseigne::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $enseigne;

    /**
     * @ORM\OneToMany(targetEntity=PrendreRdv::class, mappedBy="user", orphanRemoval=true)
     */
    private $prendreRdvs;

    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="user", orphanRemoval=true)
     */
    private $commandes;

    public function __construct()
    {
        $this->prendreRdvs = new ArrayCollection();
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEnseigne(): ?Enseigne
    {
        return $this->enseigne;
    }

    public function setEnseigne(Enseigne $enseigne): self
    {
        // set the owning side of the relation if necessary
        if ($enseigne->getUser() !== $this) {
            $enseigne->setUser($this);
        }

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
            $prendreRdv->setUser($this);
        }

        return $this;
    }

    public function removePrendreRdv(PrendreRdv $prendreRdv): self
    {
        if ($this->prendreRdvs->removeElement($prendreRdv)) {
            // set the owning side to null (unless already changed)
            if ($prendreRdv->getUser() === $this) {
                $prendreRdv->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getUser() === $this) {
                $commande->setUser(null);
            }
        }

        return $this;
    }

}
