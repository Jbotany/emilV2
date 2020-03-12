<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfilRepository")
 */
class Profil
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $intitule;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Droit")
     */
    private $droit;

    public function __construct()
    {
        $this->droit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection|Droit[]
     */
    public function getDroit(): Collection
    {
        return $this->droit;
    }

    public function addDroit(Droit $droit): self
    {
        if (!$this->droit->contains($droit)) {
            $this->droit[] = $droit;
        }

        return $this;
    }

    public function removeDroit(Droit $droit): self
    {
        if ($this->droit->contains($droit)) {
            $this->droit->removeElement($droit);
        }

        return $this;
    }
}
