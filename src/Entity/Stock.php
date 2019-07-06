<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockRepository")
 */
class Stock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
     */
    private $article;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantityStock;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Depot", inversedBy="stocks",cascade={"persist", "remove"})
     */
    private $depot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomArticle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomDepot;


 
    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuantityStock(): ?int
    {
        return $this->quantityStock;
    }

    public function setQuantityStock(?int $quantityStock): self
    {
        $this->quantityStock = $quantityStock;

        return $this;
    }


    public function __toString()
    {

        return $this->article->__toString();
    }

    public function getDepot(): ?Depot
    {
        return $this->depot;
    }

    public function setDepot(?Depot $depot): self
    {
        $this->depot = $depot;

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

    public function getNomDepot(): ?string
    {
        return $this->nomDepot;
    }

    public function setNomDepot(?string $nomDepot): self
    {
        $this->nomDepot = $nomDepot;

        return $this;
    }
}
