<?php

namespace App\Entity;

use App\Repository\OffresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OffresRepository::class)
 */
class Offres
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $pole;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $contratType;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $payment;

    /**
     * @ORM\Column(type="string", length=455, nullable=true)
     */
    private $skills;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $posteRecherche;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $begginingAT;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $publishedAT;

    /**
     * @ORM\Column(type="string", length=855, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Candidats::class, mappedBy="offrePostule")
     */
    private $candidats;

    public function __construct()
    {
        $this->publishedAT = new \DateTime();
        $this->candidats = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPole(): ?string
    {
        return $this->pole;
    }

    public function setPole(?string $pole): self
    {
        $this->pole = $pole;

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

    public function getContratType(): ?string
    {
        return $this->contratType;
    }

    public function setContratType(?string $contratType): self
    {
        $this->contratType = $contratType;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(?string $skills): self
    {
        $this->skills = $skills;

        return $this;
    }

    public function getPosteRecherche(): ?string
    {
        return $this->posteRecherche;
    }

    public function setPosteRecherche(?string $posteRecherche): self
    {
        $this->posteRecherche = $posteRecherche;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getBegginingAT()
    {
        return $this->begginingAT;
    }

    /**
     * @param $begginingAT
     * @return $this
     */
    public function setBegginingAT( $begginingAT)
    {
        $this->begginingAT = $begginingAT;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getPublishedAT()
    {
        return $this->publishedAT;
    }

    /**
     * @param $publishedAT
     * @return $this
     */
    public function setPublishedAT( $publishedAT)
    {
        $this->publishedAT = $publishedAT;

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

    /**
     * @return Collection|Candidats[]
     */
    public function getCandidats(): Collection
    {
        return $this->candidats;
    }

    public function addCandidat(Candidats $candidat)
    {
        $candidat->addOffrePostule($this);
        $this->candidats->add($candidat);
        /*if (!$this->candidats->contains($candidat)) {
            $this->candidats[] = $candidat;
            $candidat->addOffrePostule($this);
        }

        return $this;*/
    }

    public function removeCandidat(Candidats $candidat): self
    {
        if ($this->candidats->removeElement($candidat)) {
            $candidat->removeOffrePostule($this);
        }

        return $this;
    }
}
