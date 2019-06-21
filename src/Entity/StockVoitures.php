<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockVoituresRepository")
 */
class StockVoitures
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */

    private $quantiteStockVoiture;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Commercial", cascade={"persist", "remove"})
     */
    private $commercial;


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
        $this->quantiteStockVoiture= $quantiteStockVoiture;

        return $this;
    }

    public function getCommercial(): ?Commercial
    {
        return $this->commercial;
    }

    public function setCommercial(?Commercial $commercial): self
    {
        $this->commercial = $commercial;

        return $this;
    }

}
