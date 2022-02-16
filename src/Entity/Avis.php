<?php

namespace App\Entity;

use App\Repository\AvisRepository;
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
     * @ORM\ManyToOne(targetEntity=Destination::class, inversedBy="avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destination;

    /**
     * @ORM\OneToOne(targetEntity=Utilisateur::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idclient;

    /**
     * @ORM\ManyToOne(targetEntity=DemandeEvenement::class, inversedBy="avis")
     * @ORM\JoinColumn(nullable=false)
     */
    private $DemandeEvent;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdclient(): ?Utilisateur
    {
        return $this->idclient;
    }

    public function setIdclient(Utilisateur $idclient): self
    {
        $this->idclient = $idclient;

        return $this;
    }

    public function getDemandeEvent(): ?DemandeEvenement
    {
        return $this->DemandeEvent;
    }

    public function setDemandeEvent(?DemandeEvenement $DemandeEvent): self
    {
        $this->DemandeEvent = $DemandeEvent;

        return $this;
    }
}
