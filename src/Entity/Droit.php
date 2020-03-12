<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DroitRepository")
 */
class Droit
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $droitLecture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $droitEcriture;

    /**
     * @ORM\Column(type="boolean")
     */
    private $droitSuppression;

    /**
     * @ORM\Column(type="boolean")
     */
    private $droitAdmin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDroitLecture(): ?bool
    {
        return $this->droitLecture;
    }

    public function setDroitLecture(bool $droitLecture): self
    {
        $this->droitLecture = $droitLecture;

        return $this;
    }

    public function getDroitEcriture(): ?bool
    {
        return $this->droitEcriture;
    }

    public function setDroitEcriture(bool $droitEcriture): self
    {
        $this->droitEcriture = $droitEcriture;

        return $this;
    }

    public function getDroitSuppression(): ?bool
    {
        return $this->droitSuppression;
    }

    public function setDroitSuppression(bool $droitSuppression): self
    {
        $this->droitSuppression = $droitSuppression;

        return $this;
    }

    public function getDroitAdmin(): ?bool
    {
        return $this->droitAdmin;
    }

    public function setDroitAdmin(bool $droitAdmin): self
    {
        $this->droitAdmin = $droitAdmin;

        return $this;
    }
}
