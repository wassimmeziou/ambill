<?php

namespace App\Entity;

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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $quantiteDepot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresseDepot;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantiteDepot(): ?int
    {
        return $this->quantiteDepot;
    }

    public function setQuantiteDepot(?int $quantiteDepot): self
    {
        $this->quantiteDepot = $quantiteDepot;

        return $this;
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
	public function __toString() {

    return $this->adresseDepot;
}
}
