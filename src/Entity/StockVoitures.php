<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  *  @ApiResource(attributes={
 *  "formats"={"json", "jsonld"},
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * })
 * @ORM\Entity(repositoryClass="App\Repository\StockVoituresRepository")
 */
class StockVoitures
{
    /**
     *  @Groups({"read", "write"})
     * 
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"read", "write"})
     * 
     * @ORM\Column(type="integer")
     */

    private $quantiteStockVoiture;



    /**
     * @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Article",cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     * 
     */
    private $article;

    /**
     *     @Groups({"read", "write"})
    * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomArticle;

    /**
     * @Groups({"read", "write"})
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomVoiture;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture", inversedBy="stockVoitures",cascade={"persist", "remove"})
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
        $this->quantiteStockVoiture = $quantiteStockVoiture;

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
