<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneBonSortieRepository")
 */
class LigneBonSortie
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
    private $qteArt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BonSortie")
     */
    private $bonSortie;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteArt(): ?int
    {
        return $this->qteArt;
    }

    public function setQteArt(?int $qteArt): self
    {
        $this->qteArt = $qteArt;

        return $this;
    }

    public function getArticle(): ?int
    {
        return $this->article;
    }

    public function setArticle(?int $article): self
    {
        $this->article = $article;

        return $this;
    }

    public function getBonSortie(): ?BonSortie
    {
        return $this->bonSortie;
    }

    public function setBonSortie(?BonSortie $bonSortie): self
    {
        $this->bonSortie = $bonSortie;

        return $this;
    }
}
