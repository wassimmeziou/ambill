<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  *  @ApiResource
 * @ORM\Entity(repositoryClass="App\Repository\EtatFactureRepository")
 */
class EtatFacture
{
    /**
     *  @Groups({"read", "write"})
     * 
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $ref;

    /**
     *  @Groups({"read"})
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $description;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(?string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
