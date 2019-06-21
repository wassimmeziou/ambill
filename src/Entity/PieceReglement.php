<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PieceReglementRepository")
 */
class PieceReglement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $typeRegl;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reglement")
     * @ORM\JoinColumn(nullable=true)
     */
    private $reglement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeRegl(): ?string
    {
        return $this->typeRegl;
    }

    public function setTypeRegl(?string $typeRegl): self
    {
        $this->typeRegl = $typeRegl;

        return $this;
    }

    public function getReglement(): ?Reglement
    {
        return $this->reglement;
    }

    public function setReglement(?Reglement $reglement): self
    {
        $this->reglement = $reglement;

        return $this;
    }
}
