<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneFactureRepository")
 */
class LigneFacture
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
     * @ORM\Column(type="decimal", precision=6, scale=3, nullable=true)
     */
    private $prixTT;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
     */
    private $article;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $remise;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Facture")
     * @ORM\JoinColumn(nullable=false)
     */
    private $facture;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=3, nullable=true)
     */
    private $prixUHT;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $tva;

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

    public function getPrixTT()
    {
        return $this->prixTT;
    }

    public function setPrixTT($prixTT): self
    {
        $this->prixTT = $prixTT;

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

    public function getRemise(): ?int
    {
        return $this->remise;
    }

    public function setRemise(?int $remise): self
    {
        $this->remise = $remise;

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

    public function getPrixUHT()
    {
        return $this->prixUHT;
    }

    public function setPrixUHT($prixUHT): self
    {
        $this->prixUHT = $prixUHT;

        return $this;
    }

    public function getTva(): ?int
    {
        return $this->tva;
    }

    public function setTva(?int $tva): self
    {
        $this->tva = $tva;

        return $this;
    }
}
