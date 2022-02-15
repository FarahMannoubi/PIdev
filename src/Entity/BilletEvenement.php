<?php

namespace App\Entity;

use App\Repository\BilletEvenementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BilletEvenementRepository::class)
 */
class BilletEvenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=DemandeEvenement::class, mappedBy="idEvenement")
     */
    private $idEvenement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbBillet;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity=Billet::class, inversedBy="idBilletEvenement")
     */
    private $idBilletEvenement;

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
            $idEvenement->setIdEvenement($this);
        }

        return $this;
    }

    public function removeIdEvenement(DemandeEvenement $idEvenement): self
    {
        if ($this->idEvenement->removeElement($idEvenement)) {
            // set the owning side to null (unless already changed)
            if ($idEvenement->getIdEvenement() === $this) {
                $idEvenement->setIdEvenement(null);
            }
        }

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getIdBilletEvenement(): ?Billet
    {
        return $this->idBilletEvenement;
    }

    public function setIdBilletEvenement(?Billet $idBilletEvenement): self
    {
        $this->idBilletEvenement = $idBilletEvenement;

        return $this;
    }
}
