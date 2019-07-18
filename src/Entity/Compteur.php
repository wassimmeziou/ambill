<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  *  @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\CompteurRepository")
 */
class Compteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $prefix;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $counter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomPiece;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(?string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getCounter(): ?string
    {
        return $this->counter;
    }

    public function setCounter(?string $counter): self
    {
        $this->counter = $counter;

        return $this;
    }

    public function getNomPiece(): ?string
    {
        return $this->nomPiece;
    }

    public function setNomPiece(?string $nomPiece): self
    {
        $this->nomPiece = $nomPiece;

        return $this;
    }
}
