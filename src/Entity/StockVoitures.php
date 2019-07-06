<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockVoituresRepository")
 */
class StockVoitures
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */

    private $quantiteStockVoiture;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
     */
    private $article;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomArticle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomVoiture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="stockVoitures")
     */
    private $voiture;



    public function getId(): ?int
    {
        return $this->id;
    }


    public function getQuantiteStockVoiture(): ?int
    {
        return $this->quantiteStockVoiture;
    }

    public function setQuantiteStockVoiture(?int $quantiteStockVoiture): self
    {
        $this->quantiteStockVoiture= $quantiteStockVoiture;

        return $this;
    }

   
    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getNomArticle(): ?string
    {
        return $this->nomArticle;
    }

    public function setNomArticle(?string $nomArticle): self
    {
        $this->nomArticle = $nomArticle;

        return $this;
    }

    public function getNomVoiture(): ?string
    {
        return $this->nomVoiture;
    }

    public function setNomVoiture(?string $nomVoiture): self
    {
        $this->nomVoiture = $nomVoiture;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): self
    {
        $this->voiture = $voiture;

        return $this;
    }

}
