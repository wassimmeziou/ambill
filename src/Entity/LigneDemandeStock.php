<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneDemandeStockRepository")
 */
class LigneDemandeStock
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
    private $qte;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\demandeStock")
     */
    private $demandeStock;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
    * @ORM\JoinColumn(name="article_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     * 
     */
    private $article;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQte(): ?int
    {
        return $this->qte;
    }

    public function setQte(?int $qte): self
    {
        $this->qte = $qte;

        return $this;
    }

    public function getDemandeStock(): ?demandeStock
    {
        return $this->demandeStock;
    }

    public function setDemandeStock(?demandeStock $demandeStock): self
    {
        $this->demandeStock = $demandeStock;

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
