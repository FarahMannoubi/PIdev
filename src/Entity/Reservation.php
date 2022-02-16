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
     * @ORM\OneToMany(targetEntity=Billet::class, mappedBy="reservation")
     */
    private $billets;

    /**
     * @ORM\ManyToOne(targetEntity=DemandeEvenement::class, inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $demandeEvent;

    public function __construct()
    {
        $this->billets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDemandeEvent(): ?DemandeEvenement
    {
        return $this->demandeEvent;
    }

    public function setDemandeEvent(?DemandeEvenement $demandeEvent): self
    {
        $this->demandeEvent = $demandeEvent;

        return $this;
    }
}
