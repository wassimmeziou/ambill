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
 * @ORM\Entity(repositoryClass="App\Repository\LigneFactureRepository")
 */
class LigneFacture
{
    /**
     *  @Groups({"read", "write"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *   @Groups({"read", "write"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $qte;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="decimal", precision=6, scale=3, nullable=true)
     */
    private $prixTT;

    /**
     *   @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Article")
    * @ORM\JoinColumn(name="article_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     * 
     */
    private $article;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $remise;

    /**
     *   @Groups({"read"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Facture", inversedBy="ligneFacture")
     * @ORM\JoinColumn(nullable=false)
     * 
     */
    private $facture;

    /**
     *   @Groups({"read", "write"})
     * @ORM\Column(type="decimal", precision=6, scale=3, nullable=true)
     */
    private $prixUHT;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $tva;

    /**
     *  @Groups({"read", "write"})
     * 
     * @ORM\Column(type="decimal", precision=6, scale=3, nullable=true)
     */
    private $prixTTC;

    /**
     *  @Groups({"read", "write"})
     * 
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $prixFinal;

  
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

    public function getPrixTTC()
    {
        return $this->prixTTC;
    }

    public function setPrixTTC($prixTTC): self
    {
        $this->prixTTC = $prixTTC;

        return $this;
    }

    public function getPrixFinal()
    {
        return $this->prixFinal;
    }

    public function setPrixFinal($prixFinal): self
    {
        $this->prixFinal = $prixFinal;

        return $this;
    }
}
