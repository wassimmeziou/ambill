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
 * @ORM\Entity(repositoryClass="App\Repository\VoitureRepository")
 */
class Voiture
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *  @Groups({"read", "write"})
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     * 
     */
    private $matricule;

    /**
     *  @Groups({"read", "write"})
     * 
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $model;


    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Commercial", mappedBy="voiture", cascade={"persist", "remove"})
     */
    private $commercial;

    /**
     * @Groups({"read", "write"})
     * @ORM\OneToMany(targetEntity="App\Entity\StockVoitures", mappedBy="voiture")
     */
    private $stockVoitures;

    public function __construct()
    {
        $this->stockVoitures = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getCommercial(): ?Commercial
    {
        return $this->commercial;
    }

    public function setCommercial(?Commercial $commercial): self
    {
        $this->commercial = $commercial;

        // set (or unset) the owning side of the relation if necessary
        $newVoiture = $commercial === null ? null : $this;
        if ($newVoiture !== $commercial->getVoiture()) {
            $commercial->setVoiture($newVoiture);
        }

        return $this;
    }

   
	public function __toString() {
                                $x = $this->matricule;
                                $y = $this->model;
                                
                            return $y . " ".$x;
                        }

    /**
     * @return Collection|StockVoitures[]
     */
    public function getStockVoitures(): Collection
    {
        return $this->stockVoitures;
    }

    public function addStockVoiture(StockVoitures $stockVoiture): self
    {
        if (!$this->stockVoitures->contains($stockVoiture)) {
            $this->stockVoitures[] = $stockVoiture;
            $stockVoiture->setVoiture($this);
        }

        return $this;
    }

    public function removeStockVoiture(StockVoitures $stockVoiture): self
    {
        if ($this->stockVoitures->contains($stockVoiture)) {
            $this->stockVoitures->removeElement($stockVoiture);
            // set the owning side to null (unless already changed)
            if ($stockVoiture->getVoiture() === $this) {
                $stockVoiture->setVoiture(null);
            }
        }

        return $this;
    }
  }
