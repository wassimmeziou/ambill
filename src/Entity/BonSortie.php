<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BonSortieRepository")
 */
class BonSortie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $reference;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Depot", inversedBy="bonSorties")
     */
    private $depot;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StockVoitures")
     */
    private $stockVoiture;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LigneBonSortie", mappedBy="bonSortie")
     */
    private $ligneBonSorties;




    public function __construct()
    {
        $this->depots = new ArrayCollection();
        $this->ligneBonSorties = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStockVoiture(): ?StockVoitures
    {
        return $this->stockVoiture;
    }

    public function setStockVoiture(?StockVoitures $stockVoiture): self
    {
        $this->stockVoiture = $stockVoiture;

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

    /**
     * @return Collection|LigneBonSortie[]
     */
    public function getLigneBonSorties(): Collection
    {
        return $this->ligneBonSorties;
    }

    public function addLigneBonSorty(LigneBonSortie $ligneBonSorty): self
    {
        if (!$this->ligneBonSorties->contains($ligneBonSorty)) {
            $this->ligneBonSorties[] = $ligneBonSorty;
            $ligneBonSorty->setBonSortie($this);
        }

        return $this;
    }

    public function removeLigneBonSorty(LigneBonSortie $ligneBonSorty): self
    {
        if ($this->ligneBonSorties->contains($ligneBonSorty)) {
            $this->ligneBonSorties->removeElement($ligneBonSorty);
            // set the owning side to null (unless already changed)
            if ($ligneBonSorty->getBonSortie() === $this) {
                $ligneBonSorty->setBonSortie(null);
            }
        }

        return $this;
    }
}
