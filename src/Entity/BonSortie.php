<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BonSortieRepository")
 */
class BonSortie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qteSortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StockVoitures")
     */
    private $stockVoiture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getQteSortie(): ?int
    {
        return $this->qteSortie;
    }

    public function setQteSortie(?int $qteSortie): self
    {
        $this->qteSortie = $qteSortie;

        return $this;
    }

    public function getStockVoiture(): ?StockVoitures
    {
        return $this->stockVoiture;
    }

    public function setStockVoiture(?StockVoitures $stockVoiture): self
    {
        $this->stockVoiture = $stockVoiture;

        return $this;
    }
}
