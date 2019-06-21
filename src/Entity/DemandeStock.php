<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandeStockRepository")
 */
class DemandeStock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commercial")
     */
    private $comercial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComercial(): ?Commercial
    {
        return $this->comercial;
    }

    public function setComercial(?Commercial $comercial): self
    {
        $this->comercial = $comercial;

        return $this;
    }

}
