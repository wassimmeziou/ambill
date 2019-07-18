<?php

namespace App\Entity;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 *  *  @ApiResource

 * @ORM\Entity(repositoryClass="App\Repository\TvaRepository")
 */
class Tva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *  @Groups({"read", "write"})
     */
    private $id;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $valeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(?int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }
	public function __toString() {
	$x = $this->valeur;
	$y = (string)$x;
	$w = $this->nom;
   // return $w . " ".$y."%";
    return $y."%";
}
}
