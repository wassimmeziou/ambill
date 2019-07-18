<?php
// api/src/Entity/Article.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 *  @ApiResource(attributes={
 *  "formats"={"json", "jsonld"},
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 *    
 * })
 *    @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
 const GENRES = ['Litre', 'Kg','Piece'];
    /**
     * @Groups({"read", "write"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *   @Groups({"read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $designation;

    /**
     *   @Groups({"read"})
     * @ORM\Column(type="decimal", precision=6, scale=3, nullable=true)
     */
    private $prixTTC;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $disponibilit;

    /**
     *   @Groups({"read"})
	*@Assert\Choice(choices=Article::GENRES, message="Choose a valid genre.")
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $unit;

    /**
	* @Groups({"read"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Tva")
    * @ORM\JoinColumn(name="tva_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     * 
     */
    private $tva;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $barCode;

    /**
     *   @Groups({"read"})
     * @ORM\Column(type="float", nullable=true)
     */
    private $marge;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="decimal", precision=6, scale=3, nullable=true)
     */
    private $prixVente;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="decimal", precision=6, scale=3)
     */
    private $prixAchat;


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

  public function getMarge(): ?float
  {
      return $this->marge;
  }

  public function setMarge(?float $marge): self
  {
      $this->marge = $marge;

      return $this;
  }

  public function getPrixVente()
  {
      return $this->prixVente;
  }

  public function setPrixVente($prixVente): self
  {
      $this->prixVente = $prixVente;

      return $this;
  }

  public function getPrixAchat()
  {
      return $this->prixAchat;
  }

  public function setPrixAchat($prixAchat): self
  {
      $this->prixAchat = $prixAchat;

      return $this;
  }
}
