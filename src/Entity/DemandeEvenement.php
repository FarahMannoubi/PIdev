<?php

namespace App\Entity;

use App\Repository\DemandeEvenementRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $dataDeDemande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionDemande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateDebEven;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateFinEven;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $heureDebEven;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $heureFinEven;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbBillet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $discriptionEven;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="demandeEvenements")
     */
    private $utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Destination::class, inversedBy="demandeEvenements")
     */
    private $destination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataDeDemande(): ?string
    {
        return $this->dataDeDemande;
    }

    public function setDataDeDemande(string $dataDeDemande): self
    {
        $this->dataDeDemande = $dataDeDemande;

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

    public function getDescriptionDemande(): ?string
    {
        return $this->descriptionDemande;
    }

    public function setDescriptionDemande(string $descriptionDemande): self
    {
        $this->descriptionDemande = $descriptionDemande;

        return $this;
    }

    public function getDateDebEven(): ?string
    {
        return $this->dateDebEven;
    }

    public function setDateDebEven(string $dateDebEven): self
    {
        $this->dateDebEven = $dateDebEven;

        return $this;
    }

    public function getDateFinEven(): ?string
    {
        return $this->dateFinEven;
    }

    public function setDateFinEven(string $dateFinEven): self
    {
        $this->dateFinEven = $dateFinEven;

        return $this;
    }

    public function getHeureDebEven(): ?string
    {
        return $this->heureDebEven;
    }

    public function setHeureDebEven(string $heureDebEven): self
    {
        $this->heureDebEven = $heureDebEven;

        return $this;
    }

    public function getHeureFinEven(): ?string
    {
        return $this->heureFinEven;
    }

    public function setHeureFinEven(string $heureFinEven): self
    {
        $this->heureFinEven = $heureFinEven;

        return $this;
    }

    public function getNbBillet(): ?int
    {
        return $this->nbBillet;
    }

    public function setNbBillet(int $nbBillet): self
    {
        $this->nbBillet = $nbBillet;

        return $this;
    }

    public function getDiscriptionEven(): ?string
    {
        return $this->discriptionEven;
    }

    public function setDiscriptionEven(string $discriptionEven): self
    {
        $this->discriptionEven = $discriptionEven;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

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
