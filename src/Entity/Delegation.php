<?php

namespace App\Entity;

use App\Repository\DelegationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DelegationRepository::class)
 */
class Delegation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Gouvernorat::class, inversedBy="delegations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Gouvernorat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGouvernorat(): ?Gouvernorat
    {
        return $this->Gouvernorat;
    }

    public function setGouvernorat(?Gouvernorat $Gouvernorat): self
    {
        $this->Gouvernorat = $Gouvernorat;

        return $this;
    }
}
