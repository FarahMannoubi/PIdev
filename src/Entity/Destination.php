<?php

namespace App\Entity;

use App\Repository\DestinationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DestinationRepository::class)
 */
class Destination
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
     * @ORM\OneToMany(targetEntity=Ville::class, mappedBy="idVille", orphanRemoval=true)
     */
    private $idVille;

    /**
     * @ORM\OneToMany(targetEntity=SousCategorie::class, mappedBy="IdSousCategorie")
     */
    private $idSousCategorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $discription;

    /**
     * @ORM\ManyToOne(targetEntity=CoutDestination::class, inversedBy="idDistination")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idDestination;

    /**
     * @ORM\ManyToOne(targetEntity=Avis::class, inversedBy="idDestination")
     */
    private $IdDestination;

    public function __construct()
    {
        $this->idVille = new ArrayCollection();
        $this->idSousCategorie = new ArrayCollection();
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
     * @return Collection|Ville[]
     */
    public function getIdVille(): Collection
    {
        return $this->idVille;
    }

    public function addIdVille(Ville $idVille): self
    {
        if (!$this->idVille->contains($idVille)) {
            $this->idVille[] = $idVille;
            $idVille->setIdVille($this);
        }

        return $this;
    }

    public function removeIdVille(Ville $idVille): self
    {
        if ($this->idVille->removeElement($idVille)) {
            // set the owning side to null (unless already changed)
            if ($idVille->getIdVille() === $this) {
                $idVille->setIdVille(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SousCategorie[]
     */
    public function getIdSousCategorie(): Collection
    {
        return $this->idSousCategorie;
    }

    public function addIdSousCategorie(SousCategorie $idSousCategorie): self
    {
        if (!$this->idSousCategorie->contains($idSousCategorie)) {
            $this->idSousCategorie[] = $idSousCategorie;
            $idSousCategorie->setIdSousCategorie($this);
        }

        return $this;
    }

    public function removeIdSousCategorie(SousCategorie $idSousCategorie): self
    {
        if ($this->idSousCategorie->removeElement($idSousCategorie)) {
            // set the owning side to null (unless already changed)
            if ($idSousCategorie->getIdSousCategorie() === $this) {
                $idSousCategorie->setIdSousCategorie(null);
            }
        }

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

    public function getDiscription(): ?string
    {
        return $this->discription;
    }

    public function setDiscription(string $discription): self
    {
        $this->discription = $discription;

        return $this;
    }

    public function getIdDestination(): ?CoutDestination
    {
        return $this->idDestination;
    }

    public function setIdDestination(?CoutDestination $idDestination): self
    {
        $this->idDestination = $idDestination;

        return $this;
    }
}
