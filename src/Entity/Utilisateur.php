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
     * @ORM\OneToOne(targetEntity=Avis::class, mappedBy="idClient", cascade={"persist", "remove"})
     */
    private $avis;

    /**
     * @ORM\OneToMany(targetEntity=DemandeEvenement::class, mappedBy="idClient")
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

    public function getAvis(): ?Avis
    {
        return $this->avis;
    }

    public function setAvis(Avis $avis): self
    {
        // set the owning side of the relation if necessary
        if ($avis->getIdClient() !== $this) {
            $avis->setIdClient($this);
        }

        $this->avis = $avis;

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
            $demandeEvenement->setIdClient($this);
        }

        return $this;
    }

    public function removeDemandeEvenement(DemandeEvenement $demandeEvenement): self
    {
        if ($this->demandeEvenements->removeElement($demandeEvenement)) {
            // set the owning side to null (unless already changed)
            if ($demandeEvenement->getIdClient() === $this) {
                $demandeEvenement->setIdClient(null);
            }
        }

        return $this;
    }
}
