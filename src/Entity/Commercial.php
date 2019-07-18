<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
// use Symfony\Component\Intl\Intl;
use Symfony\Component\Intl\Countries;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  *  @ApiResource(attributes={
 *  "formats"={"json", "jsonld"},
 *     "normalization_context"={"groups"={"read"}},
 *     "denormalization_context"={"groups"={"write"}}
 * })
 * @ORM\Entity(repositoryClass="App\Repository\CommercialRepository")
 */
class Commercial
{
    /**
     * @Groups({"read", "write"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *  
     */
    private $id;

    /**
     * @Groups({"read"})
     * @ORM\Column(type="string", length=255)
     */
    public $cin;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $nom;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $prenom;

    /**
     * @Groups({"read"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     *  @Groups({"read"})
     *  
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ville;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     *  @Groups({"read", "write"})
     * @ORM\OneToOne(targetEntity="App\Entity\Voiture", inversedBy="commercial", cascade={"persist", "remove"})
     */
    private $voiture;


    public function getCountryName() {
       // return Intl::getRegionBundle()->getCountryName($this->getVille());
        return  Countries::getName($this->getVille());
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }
	public function __toString() {
         		$x = $this->prenom;
         		
         		$w = $this->nom;
             return $w . " ".$x;
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
