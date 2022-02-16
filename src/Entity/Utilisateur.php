<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToMany(targetEntity=DemandeEvenement::class, mappedBy="utilisateur")
     */
    private $demandeEvenements;

    public function __construct()
    {
        $this->demandeEvenements = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
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

    public function getIdUtilisateur(): ?DemandeEvenement
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?DemandeEvenement $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * @return Collection|DemandeEvenement[]
     */
    public function getDemandeEvenements(): Collection
    {
        return $this->demandeEvenements;
    }

    public function addDemandeEvenement(DemandeEvenement $demandeEvenement): self
    {
        if (!$this->demandeEvenements->contains($demandeEvenement)) {
            $this->demandeEvenements[] = $demandeEvenement;
            $demandeEvenement->setUtilisateur($this);
        }

        return $this;
    }

    public function removeDemandeEvenement(DemandeEvenement $demandeEvenement): self
    {
        if ($this->demandeEvenements->removeElement($demandeEvenement)) {
            // set the owning side to null (unless already changed)
            if ($demandeEvenement->getUtilisateur() === $this) {
                $demandeEvenement->setUtilisateur(null);
            }
        }

        return $this;
    }
}
