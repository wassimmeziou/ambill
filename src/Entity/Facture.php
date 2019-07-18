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
 * @ORM\Entity(repositoryClass="App\Repository\FactureRepository")
 */
class Facture
{
    /**
     *  @Groups({"read", "write"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * 
     *@Groups({"read", "write"})
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateSaisie;

    /**
     * @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Client")
     */
    private $client;


    /**
     *  @Groups({"read", "write"})
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $prixTotal;

    /**
     *  @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\Commercial")
     */
    private $commercial;

    /**
     *  *@Groups({"read", "write"})
     * @ORM\OneToMany(targetEntity="App\Entity\LigneFacture", mappedBy="facture",cascade={"persist", "remove"})
     */
    private $ligneFacture;



    /**
     * @Groups({"read", "write"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $refExterne;

    /**
     * @Groups({"read", "write"})
     * @ORM\ManyToOne(targetEntity="App\Entity\EtatFacture",cascade={"persist", "remove"})
     */
    private $etat;

    /**
     *@Groups({"read", "write"})
     * @ORM\Column(type="string", length=12, nullable=true)
     */
    private $codeIntern;

    public function __construct()
    {
        $this->ligneFacture = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSaisie(): ?\DateTimeInterface
    {
        return $this->dateSaisie;
    }

    public function setDateSaisie(?\DateTimeInterface $dateSaisie): self
    {
        $this->dateSaisie = $dateSaisie;

        return $this;
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

    public function getPrixTotal()
    {
        return $this->prixTotal;
    }

    public function setPrixTotal($prixTotal): self
    {
        $this->prixTotal = $prixTotal;

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

    /**
     * @return Collection|LigneFacture[]
     */
    public function getLigneFacture(): Collection
    {
        return $this->ligneFacture;
    }

    public function addLigneFacture(LigneFacture $ligneFacture): self
    {
        if (!$this->ligneFacture->contains($ligneFacture)) {
            $this->ligneFacture[] = $ligneFacture;
            $ligneFacture->setFacture($this);
        }

        return $this;
    }

    public function removeLigneFacture(LigneFacture $ligneFacture): self
    {
        if ($this->ligneFacture->contains($ligneFacture)) {
            $this->ligneFacture->removeElement($ligneFacture);
            // set the owning side to null (unless already changed)
            if ($ligneFacture->getFacture() === $this) {
                $ligneFacture->setFacture(null);
            }
        }

        return $this;
    }

    public function getRefExterne(): ?string
    {
        return $this->refExterne;
    }

    public function setRefExterne(?string $refExterne): self
    {
        $this->refExterne = $refExterne;

        return $this;
    }

    public function getEtat(): ?EtatFacture
    {
        return $this->etat;
    }

    public function setEtat(?EtatFacture $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getCodeIntern(): ?string
    {
        return $this->codeIntern;
    }

    public function setCodeIntern(?string $codeIntern): self
    {
        $this->codeIntern = $codeIntern;

        return $this;
    }
}
