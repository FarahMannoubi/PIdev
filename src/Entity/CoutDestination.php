<?php

namespace App\Entity;

use App\Repository\CoutDestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoutDestinationRepository::class)
 */
class CoutDestination
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Destination::class, mappedBy="idDestination")
     */
    private $idDistination;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacité;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    public function __construct()
    {
        $this->idDistination = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Destination[]
     */
    public function getIdDistination(): Collection
    {
        return $this->idDistination;
    }

    public function addIdDistination(Destination $idDistination): self
    {
        if (!$this->idDistination->contains($idDistination)) {
            $this->idDistination[] = $idDistination;
            $idDistination->setIdDestination($this);
        }

        return $this;
    }

    public function removeIdDistination(Destination $idDistination): self
    {
        if ($this->idDistination->removeElement($idDistination)) {
            // set the owning side to null (unless already changed)
            if ($idDistination->getIdDestination() === $this) {
                $idDistination->setIdDestination(null);
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

    public function getCapacité(): ?int
    {
        return $this->capacité;
    }

    public function setCapacité(int $capacité): self
    {
        $this->capacité = $capacité;

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
}
