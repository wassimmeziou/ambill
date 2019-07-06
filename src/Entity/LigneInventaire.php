<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LigneInventaireRepository")
 */
class LigneInventaire
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
    private $qteInv;

        /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $nomArticle;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article",  fetch="EAGER")
     */
    private $article;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Inventaire", inversedBy="ligneInventaires")
     */
    private $inventaire;
    

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQteInv(): ?int
    {
        return $this->qteInv;
    }

    public function setQteInv(?int $qteInv): self
    {
        $this->qteInv = $qteInv;

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

    public function getInventaire(): ?Inventaire
    {
        return $this->inventaire;
    }

    public function setInventaire(?Inventaire $inventaire): self
    {
        $this->inventaire = $inventaire;

        return $this;
    }
}
