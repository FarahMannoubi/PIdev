<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 */
class Reservation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=DemandeEvenement::class, mappedBy="idEnement")
     */
    private $idEvenement;

    /**
     * @ORM\Column(type="date")
     */
    private $dateReservation;

    /**
     * @ORM\Column(type="time")
     */
    private $heureReservation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statu;

    /**
     * @ORM\Column(type="float")
     */
    private $cout;

    /**
     * @ORM\ManyToOne(targetEntity=Billet::class, inversedBy="idReservation")
     */
    private $idReservation;

    public function __construct()
    {
        $this->idEvenement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $idEvenement->setIdEnement($this);
        }

        return $this;
    }

    public function removeIdEvenement(DemandeEvenement $idEvenement): self
    {
        if ($this->idEvenement->removeElement($idEvenement)) {
            // set the owning side to null (unless already changed)
            if ($idEvenement->getIdEnement() === $this) {
                $idEvenement->setIdEnement(null);
            }
        }

        return $this;
    }

    public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }

    public function setDateReservation(\DateTimeInterface $dateReservation): self
    {
        $this->dateReservation = $dateReservation;

        return $this;
    }

    public function getHeureReservation(): ?\DateTimeInterface
    {
        return $this->heureReservation;
    }

    public function setHeureReservation(\DateTimeInterface $heureReservation): self
    {
        $this->heureReservation = $heureReservation;

        return $this;
    }

    public function getStatu(): ?string
    {
        return $this->statu;
    }

    public function setStatu(string $statu): self
    {
        $this->statu = $statu;

        return $this;
    }

    public function getCout(): ?float
    {
        return $this->cout;
    }

    public function setCout(float $cout): self
    {
        $this->cout = $cout;

        return $this;
    }

    public function getIdReservation(): ?Billet
    {
        return $this->idReservation;
    }

    public function setIdReservation(?Billet $idReservation): self
    {
        $this->idReservation = $idReservation;

        return $this;
    }
}
