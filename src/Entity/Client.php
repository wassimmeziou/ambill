<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 *  *  @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     *   @Groups({"read", "write"})
     */
    private $id;

    /**
     *   @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $raisonSocial;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     *   @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tel;

    /**
     *   @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $longitude;

    /**
     *   @Groups({"read", "write"})
     * 
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lattitude;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSocial(): ?string
    {
        return $this->raisonSocial;
    }

    public function setRaisonSocial(?string $raisonSocial): self
    {
        $this->raisonSocial = $raisonSocial;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }
	public function __toString() {
                      return $this->raisonSocial;
                  }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLattitude(): ?string
    {
        return $this->lattitude;
    }

    public function setLattitude(?string $lattitude): self
    {
        $this->lattitude = $lattitude;

        return $this;
    }
}
