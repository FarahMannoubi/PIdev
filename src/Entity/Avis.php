<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AvisRepository::class)
 */
class Avis
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="IdUtilisateur")
     */
    private $idUtilisateur;

    /**
     * @ORM\OneToMany(targetEntity=DemandeEvenement::class, mappedBy="idDemandeEvenement")
     */
    private $idEvenement;

    /**
     * @ORM\OneToMany(targetEntity=Destination::class, mappedBy="IdDestination")
     */
    private $idDestination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avis;

    /**
     * @ORM\Column(type="float")
     */
    private $note;

    public function __construct()
    {
        $this->idUtilisateur = new ArrayCollection();
        $this->idEvenement = new ArrayCollection();
        $this->idDestination = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getIdUtilisateur(): Collection
    {
        return $this->idUtilisateur;
    }

    public function addIdUtilisateur(Utilisateur $idUtilisateur): self
    {
        if (!$this->idUtilisateur->contains($idUtilisateur)) {
            $this->idUtilisateur[] = $idUtilisateur;
            $idUtilisateur->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeIdUtilisateur(Utilisateur $idUtilisateur): self
    {
        if ($this->idUtilisateur->removeElement($idUtilisateur)) {
            // set the owning side to null (unless already changed)
            if ($idUtilisateur->getIdUtilisateur() === $this) {
                $idUtilisateur->setIdUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|DemandeEvenement[]
     */
    public function getIdEvenement(): Collection
    {
        return $this->idEvenement;
    }

    public function addIdEvenement(DemandeEvenement $idEvenement): self
    {
        if (!$this->idEvenement->contains($idEvenement)) {
            $this->idEvenement[] = $idEvenement;
            $idEvenement->setIdDemandeEvenement($this);
        }

        return $this;
    }

    public function removeIdEvenement(DemandeEvenement $idEvenement): self
    {
        if ($this->idEvenement->removeElement($idEvenement)) {
            // set the owning side to null (unless already changed)
            if ($idEvenement->getIdDemandeEvenement() === $this) {
                $idEvenement->setIdDemandeEvenement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Destination[]
     */
    public function getIdDestination(): Collection
    {
        return $this->idDestination;
    }

    public function addIdDestination(Destination $idDestination): self
    {
        if (!$this->idDestination->contains($idDestination)) {
            $this->idDestination[] = $idDestination;
            $idDestination->setIdDestination($this);
        }

        return $this;
    }

    public function removeIdDestination(Destination $idDestination): self
    {
        if ($this->idDestination->removeElement($idDestination)) {
            // set the owning side to null (unless already changed)
            if ($idDestination->getIdDestination() === $this) {
                $idDestination->setIdDestination(null);
            }
        }

        return $this;
    }

    public function getAvis(): ?string
    {
        return $this->avis;
    }

    public function setAvis(string $avis): self
    {
        $this->avis = $avis;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(float $note): self
    {
        $this->note = $note;

        return $this;
    }
}
