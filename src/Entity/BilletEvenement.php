<?php

namespace App\Entity;

use App\Repository\BilletEvenementRepository;
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
     * @ORM\ManyToOne(targetEntity=DemandeEvenement::class, inversedBy="billetEvenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $demandeEvent;


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
