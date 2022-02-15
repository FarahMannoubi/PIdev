<?php

namespace App\Entity;

use App\Repository\BilletRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BilletRepository::class)
 */
class Billet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Reservation::class, mappedBy="idReservation")
     */
    private $idReservation;

    /**
     * @ORM\OneToMany(targetEntity=BilletEvenement::class, mappedBy="idBilletEvenement")
     */
    private $idBilletEvenement;

    public function __construct()
    {
        $this->idReservation = new ArrayCollection();
        $this->idBilletEvenement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getIdReservation(): Collection
    {
        return $this->idReservation;
    }

    public function addIdReservation(Reservation $idReservation): self
    {
        if (!$this->idReservation->contains($idReservation)) {
            $this->idReservation[] = $idReservation;
            $idReservation->setIdReservation($this);
        }

        return $this;
    }

    public function removeIdReservation(Reservation $idReservation): self
    {
        if ($this->idReservation->removeElement($idReservation)) {
            // set the owning side to null (unless already changed)
            if ($idReservation->getIdReservation() === $this) {
                $idReservation->setIdReservation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BilletEvenement[]
     */
    public function getIdBilletEvenement(): Collection
    {
        return $this->idBilletEvenement;
    }

    public function addIdBilletEvenement(BilletEvenement $idBilletEvenement): self
    {
        if (!$this->idBilletEvenement->contains($idBilletEvenement)) {
            $this->idBilletEvenement[] = $idBilletEvenement;
            $idBilletEvenement->setIdBilletEvenement($this);
        }

        return $this;
    }

    public function removeIdBilletEvenement(BilletEvenement $idBilletEvenement): self
    {
        if ($this->idBilletEvenement->removeElement($idBilletEvenement)) {
            // set the owning side to null (unless already changed)
            if ($idBilletEvenement->getIdBilletEvenement() === $this) {
                $idBilletEvenement->setIdBilletEvenement(null);
            }
        }

        return $this;
    }
}
