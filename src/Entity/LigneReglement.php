<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneReglementRepository")
 */
class LigneReglement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixRestant;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Facture")
     */
    private $facture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reglement")
     */
    private $reglement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixRestant(): ?int
    {
        return $this->prixRestant;
    }

    public function setPrixRestant(?int $prixRestant): self
    {
        $this->prixRestant = $prixRestant;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): self
    {
        $this->facture = $facture;

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
