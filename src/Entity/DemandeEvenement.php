<?php

namespace App\Entity;

use App\Repository\DemandeEvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeEvenementRepository::class)
 */
class DemandeEvenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=BilletEvenement::class, mappedBy="demandeEvent")
     */
    private $billetEvenements;

    /**
     * @ORM\OneToMany(targetEntity=Avis::class, mappedBy="DemandeEvent")
     */
    private $avis;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="demandeEvenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idClient;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="demandeEvent")
     */
    private $reservations;

    /**
     * @ORM\ManyToOne(targetEntity=Destination::class, inversedBy="demandeEvenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destination;



    public function __construct()
    {
        $this->billetEvenements = new ArrayCollection();
        $this->avis = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|BilletEvenement[]
     */
    public function getBilletEvenements(): Collection
    {
        return $this->billetEvenements;
    }

    public function addBilletEvenement(BilletEvenement $billetEvenement): self
    {
        if (!$this->billetEvenements->contains($billetEvenement)) {
            $this->billetEvenements[] = $billetEvenement;
            $billetEvenement->setDemandeEvent($this);
        }

        return $this;
    }

    public function removeBilletEvenement(BilletEvenement $billetEvenement): self
    {
        if ($this->billetEvenements->removeElement($billetEvenement)) {
            // set the owning side to null (unless already changed)
            if ($billetEvenement->getDemandeEvent() === $this) {
                $billetEvenement->setDemandeEvent(null);
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
            $avi->setDemandeEvent($this);
        }

        return $this;
    }

    public function removeAvi(Avis $avi): self
    {
        if ($this->avis->removeElement($avi)) {
            // set the owning side to null (unless already changed)
            if ($avi->getDemandeEvent() === $this) {
                $avi->setDemandeEvent(null);
            }
        }

        return $this;
    }

    public function getIdClient(): ?Utilisateur
    {
        return $this->idClient;
    }

    public function setIdClient(?Utilisateur $idClient): self
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setDemandeEvent($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getDemandeEvent() === $this) {
                $reservation->setDemandeEvent(null);
            }
        }

        return $this;
    }

    public function getDestination(): ?Destination
    {
        return $this->destination;
    }

    public function setDestination(?Destination $destination): self
    {
        $this->destination = $destination;

        return $this;
    }
}
