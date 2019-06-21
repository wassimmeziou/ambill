<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *    @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
 const GENRES = ['Litre', 'Kg','Piece'];
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=3)
     */
    private $prixHT;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=3, nullable=true)
     */
    private $prixTTC;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $disponibilit;

    /**
	*@Assert\Choice(choices=Article::GENRES, message="Choose a valid genre.")
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $unit;

    /**
	*
     * @ORM\ManyToOne(targetEntity="App\Entity\Tva")
     */
    private $tva;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $barCode;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(?string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getPrixHT()
    {
        return $this->prixHT;
    }

    public function setPrixHT($prixHT): self
    {
        $this->prixHT = $prixHT;

        return $this;
    }

    public function getPrixTTC()
    {
        return $this->prixTTC;
    }

    public function setPrixTTC($prixTTC): self
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    public function getDisponibilit(): ?bool
    {
        return $this->disponibilit;
    }

    public function setDisponibilit(?bool $disponibilit): self
    {
        $this->disponibilit = $disponibilit;

        return $this;
    }

    public function getUnit(): ?string
    {
        return $this->unit;
    }

    public function setUnit(?string $unit): self
    {
        $this->unit = $unit;

        return $this;
    }

    public function getTva(): ?tva
    {
        return $this->tva;
    }

    public function setTva(?tva $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getBarCode(): ?string
    {
        return $this->barCode;
    }

    public function setBarCode(?string $barCode): self
    {
        $this->barCode = $barCode;

        return $this;
    }

		public function __toString() {

    return $this->designation;
}
}
