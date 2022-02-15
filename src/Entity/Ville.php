<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Region::class, mappedBy="idRegion", orphanRemoval=true)
     */
    private $idRegion;

    /**
     * @ORM\ManyToOne(targetEntity=Destination::class, inversedBy="idVille")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idVille;

    public function __construct()
    {
        $this->idRegion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Region[]
     */
    public function getIdRegion(): Collection
    {
        return $this->idRegion;
    }

    public function addIdRegion(Region $idRegion): self
    {
        if (!$this->idRegion->contains($idRegion)) {
            $this->idRegion[] = $idRegion;
            $idRegion->setIdRegion($this);
        }

        return $this;
    }

    public function removeIdRegion(Region $idRegion): self
    {
        if ($this->idRegion->removeElement($idRegion)) {
            // set the owning side to null (unless already changed)
            if ($idRegion->getIdRegion() === $this) {
                $idRegion->setIdRegion(null);
            }
        }

        return $this;
    }

    public function getIdVille(): ?Destination
    {
        return $this->idVille;
    }

    public function setIdVille(?Destination $idVille): self
    {
        $this->idVille = $idVille;

        return $this;
    }
}
