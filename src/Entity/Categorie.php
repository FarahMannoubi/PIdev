<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\ManyToOne(targetEntity=SousCategorie::class, inversedBy="idCategorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCategorie;

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

    public function getIdCategorie(): ?SousCategorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?SousCategorie $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }
}