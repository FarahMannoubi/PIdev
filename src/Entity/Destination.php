<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinationRepository::class)
 */
class Destination
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=SousCategorie::class, inversedBy="destinations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $souscategorie;

    /**
     * @ORM\OneToMany(targetEntity=CoutDestination::class, mappedBy="destination")
     */
    private $coutDestinations;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="destination")
     */
    private $avis;

    /**
     * @ORM\OneToMany(targetEntity=DemandeEvenement::class, mappedBy="destination")
     */
    private $demandeEvenements;

    public function __construct()
    {
        $this->coutDestinations = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->demandeEvenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSouscategorie(): ?SousCategorie
    {
        return $this->souscategorie;
    }

    public function setSouscategorie(?SousCategorie $souscategorie): self
    {
        $this->souscategorie = $souscategorie;

        return $this;
    }

    /**
     * @return Collection|CoutDestination[]
     */
    public function getCoutDestinations(): Collection
    {
        return $this->coutDestinations;
    }

    public function addCoutDestination(CoutDestination $coutDestination): self
    {
        if (!$this->coutDestinations->contains($coutDestination)) {
            $this->coutDestinations[] = $coutDestination;
            $coutDestination->setDestination($this);
        }

        return $this;
    }

    public function removeCoutDestination(CoutDestination $coutDestination): self
    {
        if ($this->coutDestinations->removeElement($coutDestination)) {
            // set the owning side to null (unless already changed)
            if ($coutDestination->getDestination() === $this) {
                $coutDestination->setDestination(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Avis[]
     */
    public function getAvis(): Collection
    {
        return $this->avis;
    }

    public function addAvi(Avis $avi): self
    {
        if (!$this->avis->contains($avi)) {
            $this->avis[] = $avi;
            $avi->setDestination($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getDestination() === $this) {
                $avi->setDestination(null);
            }
        }

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
            $demandeEvenement->setDestination($this);
        }

        return $this;
    }

    public function removeDemandeEvenement(DemandeEvenement $demandeEvenement): self
    {
        if ($this->demandeEvenements->removeElement($demandeEvenement)) {
            // set the owning side to null (unless already changed)
            if ($demandeEvenement->getDestination() === $this) {
                $demandeEvenement->setDestination(null);
            }
        }

        return $this;
    }
}
