<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepotRepository")
 */
class Depot
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
    private $adresseDepot;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stock", mappedBy="depot",cascade={"persist", "remove"})
     */
    private $stocks;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomDepot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descrption;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BonSortie", mappedBy="depot")
     */
    private $bonSorties;

    public function __construct()
    {
        $this->bonSorties = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getAdresseDepot(): ?string
    {
        return $this->adresseDepot;
    }

    public function setAdresseDepot(?string $adresseDepot): self
    {
        $this->adresseDepot = $adresseDepot;

        return $this;
    }
  
    /**
     * @return Collection|Stock[]
     */
    public function getStocks(): Collection
    {
        return $this->stocks;
    }

    public function addStock(Stock $stock): self
    {
        if (!$this->stocks->contains($stock)) {
            $this->stocks[] = $stock;
            $stock->setDepot($this);
        }

        return $this;
    }

    public function removeStock(Stock $stock): self
    {
        if ($this->stocks->contains($stock)) {
            $this->stocks->removeElement($stock);
            // set the owning side to null (unless already changed)
            if ($stock->getDepot() === $this) {
                $stock->setDepot(null);
            }
        }

        return $this;
    }

    public function getNomDepot(): ?string
    {
        return $this->nomDepot;
    }

    public function setNomDepot(?string $nomDepot): self
    {
        $this->nomDepot = $nomDepot;

        return $this;
    }

    public function getDescrption(): ?string
    {
        return $this->descrption;
    }

    public function setDescrption(?string $descrption): self
    {
        $this->descrption = $descrption;

        return $this;
    }
    public function __toString()
    {
        if(is_null($this->nomDepot)) {
            return 'NULL';
        }
        return $this->nomDepot;
       // return "$this->;";
    }
}
