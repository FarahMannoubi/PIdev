<?php

namespace App\Entity;

use App\Repository\SousCategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousCategorieRepository::class)
 */
class SousCategorie
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
     * @ORM\OneToMany(targetEntity=Categorie::class, mappedBy="idCategorie")
     */
    private $idCategorie;

    /**
     * @ORM\ManyToOne(targetEntity=Destination::class, inversedBy="idSousCategorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdSousCategorie;

    public function __construct()
    {
        $this->idCategorie = new ArrayCollection();
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
     * @return Collection|Categorie[]
     */
    public function getIdCategorie(): Collection
    {
        return $this->idCategorie;
    }

    public function addIdCategorie(Categorie $idCategorie): self
    {
        if (!$this->idCategorie->contains($idCategorie)) {
            $this->idCategorie[] = $idCategorie;
            $idCategorie->setIdCategorie($this);
        }

        return $this;
    }

    public function removeIdCategorie(Categorie $idCategorie): self
    {
        if ($this->idCategorie->removeElement($idCategorie)) {
            // set the owning side to null (unless already changed)
            if ($idCategorie->getIdCategorie() === $this) {
                $idCategorie->setIdCategorie(null);
            }
        }

        return $this;
    }

    public function getIdSousCategorie(): ?Destination
    {
        return $this->IdSousCategorie;
    }

    public function setIdSousCategorie(?Destination $IdSousCategorie): self
    {
        $this->IdSousCategorie = $IdSousCategorie;

        return $this;
    }
}
