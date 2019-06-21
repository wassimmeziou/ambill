<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReglementRepository")
 */
class Reglement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datRegl;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatRegl(): ?\DateTimeInterface
    {
        return $this->datRegl;
    }

    public function setDatRegl(?\DateTimeInterface $datRegl): self
    {
        $this->datRegl = $datRegl;

        return $this;
    }
}
