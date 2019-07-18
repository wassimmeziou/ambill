<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 *  *  @ApiResource
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

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEnvoi;

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

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(?\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

}
