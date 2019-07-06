<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InventaireRepository")
 */
class Inventaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Depot")
     */
    private $depot;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateInv;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\LigneInventaire", mappedBy="inventaire",cascade={"persist", "remove"},orphanRemoval=true, fetch="EAGER")
     */
    private $ligneInventaires;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Voiture")
     */
    private $voiture;

    public function __construct()
    {
        $this->ligneInventaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateInv(): ?\DateTimeInterface
    {
        return $this->dateInv;
    }

    public function setDateInv(?\DateTimeInterface $dateInv): self
    {
        $this->dateInv = $dateInv;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return Collection|LigneInventaire[]
     */
    public function getLigneInventaires(): Collection
    {
        return $this->ligneInventaires;
    }

    public function addLigneInventaire(LigneInventaire $ligneInventaire): self
    {
        if (!$this->ligneInventaires->contains($ligneInventaire)) {
            $this->ligneInventaires[] = $ligneInventaire;
            $ligneInventaire->setInventaire($this);
        }

        return $this;
    }

    public function removeLigneInventaire(LigneInventaire $ligneInventaire): self
    {
        if ($this->ligneInventaires->contains($ligneInventaire)) {
            $this->ligneInventaires->removeElement($ligneInventaire);
            // set the owning side to null (unless already changed)
            if ($ligneInventaire->getInventaire() === $this) {
                $ligneInventaire->setInventaire(null);
            }
        }

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
