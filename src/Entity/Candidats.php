<?php

namespace App\Entity;

use App\Repository\CandidatsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CandidatsRepository::class)
 */
class Candidats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;
    /**
     * @Assert\Email(message="entrer un email valide")
     * @ORM\Column (type="string", length=50, unique=true)
     */
    private $email;

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Regex(
     * pattern="/[0-9]{10}/"
     * )
     */
    private $mobile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motivation;

    /**
     * @ORM\ManyToMany(targetEntity=Offres::class, inversedBy="candidats")
     */
    private $offrePostule;

    /**
     * @ORM\Column(type="string")
     */
    private $brochureFilename;

    public function getBrochureFilename()
    {
        return $this->brochureFilename;
    }

    public function setBrochureFilename($brochureFilename)
    {
        $this->brochureFilename = $brochureFilename;

        return $this;
    }

    public function __construct()
    {
        $this->offrePostule = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

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

    public function getMotivation(): ?string
    {
        return $this->motivation;
    }

    public function setMotivation(?string $motivation): self
    {
        $this->motivation = $motivation;

        return $this;
    }

    /**
     * @return Collection|Offres[]
     */
    public function getOffrePostule(): Collection
    {
        return $this->offrePostule;
    }

    public function addOffrePostule(Offres $offrePostule)
    {
        if (!$this->offrePostule->contains($offrePostule)) {
            $this->offrePostule->add($offrePostule);
        }
    }

    public function removeOffrePostule(Offres $offrePostule): self
    {
        $this->offrePostule->removeElement($offrePostule);

        return $this;
    }
}
