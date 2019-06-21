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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantityStock;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Depot",cascade={"persist"})
     */
    private $depot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDepot(): ?Depot
    {
        return $this->depot;
    }

    public function setDepot(?Depot $depot): self
    {
        $this->depot = $depot;

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

}
