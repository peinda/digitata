<?php

namespace App\Entity;

use App\Repository\PolitiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PolitiqueRepository::class)
 */
class Politique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column (type="string", length=250)
     */
    private $pc;

    /**
     * @return mixed
     */
    public function getPc()
    {
        return $this->pc;
    }

    /**
     * @param mixed $pc
     */
    public function setPc($pc): void
    {
        $this->pc = $pc;
    }

    /**
     * @return mixed
     */
    public function getCgu()
    {
        return $this->cgu;
    }

    /**
     * @param mixed $cgu
     */
    public function setCgu($cgu): void
    {
        $this->cgu = $cgu;
    }
    /**
     * @ORM\OneToMany (targetEntity="App\Entity\User", mappedBy="politique")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;
    
    /**
     * @ORM\Column (type="string", length=250)
     */
    private $cgu;

    public function __construct()
    {

        $this->users = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }
}
