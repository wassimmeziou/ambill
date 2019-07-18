<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/** attributes={"fetchEager": true}
 *  *  @ApiResource(attributes={
 *  "formats"={"json", "jsonld"},"force_eager": false,
 *     "normalization_context"={"groups"={"read"}, "enable_max_depth"=true},
 *     "denormalization_context"={"groups"={"write"}}
 * })
 * @ORM\Entity(repositoryClass="App\Repository\CommandsRepository")
 */
class Commands
{
    /**
     *  @Groups({"read", "write"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     *  @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     */
    private $client;

    /**
     *  @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Commercial")
     */
    private $commercial;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateCommander;

    /**
     *  @Groups({"read", "write"})
     * @ORM\OneToMany(targetEntity="App\Entity\LigneCommand", mappedBy="Command",cascade={"persist", "remove"})
     */
    private $ligneCommands;

    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $refIntern;

    public function __construct()
    {
        $this->ligneCommands = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

  

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

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

    public function getDateCommander(): ?\DateTimeInterface
    {
        return $this->dateCommander;
    }

    public function setDateCommander(?\DateTimeInterface $dateCommander): self
    {
        $this->dateCommander = $dateCommander;

        return $this;
    }

    /**
     * @return Collection|LigneCommand[]
     */
    public function getLigneCommands(): Collection
    {
        return $this->ligneCommands;
    }

    public function addLigneCommand(LigneCommand $ligneCommand): self
    {
        if (!$this->ligneCommands->contains($ligneCommand)) {
            $this->ligneCommands[] = $ligneCommand;
            $ligneCommand->setCommand($this);
        }

        return $this;
    }

    public function removeLigneCommand(LigneCommand $ligneCommand): self
    {
        if ($this->ligneCommands->contains($ligneCommand)) {
            $this->ligneCommands->removeElement($ligneCommand);
            // set the owning side to null (unless already changed)
            if ($ligneCommand->getCommand() === $this) {
                $ligneCommand->setCommand(null);
            }
        }

        return $this;
    }

    public function getRefIntern(): ?string
    {
        return $this->refIntern;
    }

    public function setRefIntern(?string $refIntern): self
    {
        $this->refIntern = $refIntern;

        return $this;
    }
}
