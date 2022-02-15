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
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="idUtilisateur")
     */
    private $idPartenaire;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDemande;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionDemande;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebutEv;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFinEv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $heureDebutEv;

    /**
     * @ORM\Column(type="time")
     */
    private $heureFinEv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nbBillet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descriptionEvenement;

    /**
     * @ORM\ManyToOne(targetEntity=BilletEvenement::class, inversedBy="idEvenement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEvenement;

    /**
     * @ORM\ManyToOne(targetEntity=Reservation::class, inversedBy="idEvenement")
     */
    private $idEnement;

    /**
     * @ORM\ManyToOne(targetEntity=Avis::class, inversedBy="idEvenement")
     */
    private $idDemandeEvenement;

    public function __construct()
    {
        $this->idPartenaire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getIdPartenaire(): Collection
    {
        return $this->idPartenaire;
    }

    public function addIdPartenaire(Utilisateur $idPartenaire): self
    {
        if (!$this->idPartenaire->contains($idPartenaire)) {
            $this->idPartenaire[] = $idPartenaire;
            $idPartenaire->setIdUtilisateur($this);
        }

        return $this;
    }

    public function removeIdPartenaire(Utilisateur $idPartenaire): self
    {
        if ($this->idPartenaire->removeElement($idPartenaire)) {
            // set the owning side to null (unless already changed)
            if ($idPartenaire->getIdUtilisateur() === $this) {
                $idPartenaire->setIdUtilisateur(null);
            }
        }

        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->dateDemande;
    }

    public function setDateDemande(\DateTimeInterface $dateDemande): self
    {
        $this->dateDemande = $dateDemande;

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

    public function getDateDebutEv(): ?\DateTimeInterface
    {
        return $this->dateDebutEv;
    }

    public function setDateDebutEv(\DateTimeInterface $dateDebutEv): self
    {
        $this->dateDebutEv = $dateDebutEv;

        return $this;
    }

    public function getDateFinEv(): ?\DateTimeInterface
    {
        return $this->dateFinEv;
    }

    public function setDateFinEv(\DateTimeInterface $dateFinEv): self
    {
        $this->dateFinEv = $dateFinEv;

        return $this;
    }

    public function getHeureDebutEv(): ?string
    {
        return $this->heureDebutEv;
    }

    public function setHeureDebutEv(string $heureDebutEv): self
    {
        $this->heureDebutEv = $heureDebutEv;

        return $this;
    }

    public function getHeureFinEv(): ?\DateTimeInterface
    {
        return $this->heureFinEv;
    }

    public function setHeureFinEv(\DateTimeInterface $heureFinEv): self
    {
        $this->heureFinEv = $heureFinEv;

        return $this;
    }

    public function getNbBillet(): ?string
    {
        return $this->nbBillet;
    }

    public function setNbBillet(string $nbBillet): self
    {
        $this->nbBillet = $nbBillet;

        return $this;
    }

    public function getDescriptionEvenement(): ?string
    {
        return $this->descriptionEvenement;
    }

    public function setDescriptionEvenement(string $descriptionEvenement): self
    {
        $this->descriptionEvenement = $descriptionEvenement;

        return $this;
    }

    public function getIdEvenement(): ?BilletEvenement
    {
        return $this->idEvenement;
    }

    public function setIdEvenement(?BilletEvenement $idEvenement): self
    {
        $this->idEvenement = $idEvenement;

        return $this;
    }

    public function getIdEnement(): ?Reservation
    {
        return $this->idEnement;
    }

    public function setIdEnement(?Reservation $idEnement): self
    {
        $this->idEnement = $idEnement;

        return $this;
    }

    public function getIdDemandeEvenement(): ?Avis
    {
        return $this->idDemandeEvenement;
    }

    public function setIdDemandeEvenement(?Avis $idDemandeEvenement): self
    {
        $this->idDemandeEvenement = $idDemandeEvenement;

        return $this;
    }
}
