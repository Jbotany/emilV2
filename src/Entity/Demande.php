<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DemandeRepository")
 */
class Demande
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
    private $sujet;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateMEPVisee;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chiffrageJoursMin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $chiffrageJoursMax;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDevis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Activite", mappedBy="demande")
     */
    private $activites;

    public function __construct()
    {
        $this->activites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getDateMEPVisee(): ?\DateTimeInterface
    {
        return $this->dateMEPVisee;
    }

    public function setDateMEPVisee(?\DateTimeInterface $dateMEPVisee): self
    {
        $this->dateMEPVisee = $dateMEPVisee;

        return $this;
    }

    public function getChiffrageJoursMin(): ?int
    {
        return $this->chiffrageJoursMin;
    }

    public function setChiffrageJoursMin(?int $chiffrageJoursMin): self
    {
        $this->chiffrageJoursMin = $chiffrageJoursMin;

        return $this;
    }

    public function getChiffrageJoursMax(): ?int
    {
        return $this->chiffrageJoursMax;
    }

    public function setChiffrageJoursMax(?int $chiffrageJoursMax): self
    {
        $this->chiffrageJoursMax = $chiffrageJoursMax;

        return $this;
    }

    public function getDateDevis(): ?\DateTimeInterface
    {
        return $this->dateDevis;
    }

    public function setDateDevis(?\DateTimeInterface $dateDevis): self
    {
        $this->dateDevis = $dateDevis;

        return $this;
    }

    /**
     * @return Collection|Activite[]
     */
    public function getActivites(): Collection
    {
        return $this->activites;
    }

    public function addActivite(Activite $activite): self
    {
        if (!$this->activites->contains($activite)) {
            $this->activites[] = $activite;
            $activite->setDemande($this);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): self
    {
        if ($this->activites->contains($activite)) {
            $this->activites->removeElement($activite);
            // set the owning side to null (unless already changed)
            if ($activite->getDemande() === $this) {
                $activite->setDemande(null);
            }
        }

        return $this;
    }
}
