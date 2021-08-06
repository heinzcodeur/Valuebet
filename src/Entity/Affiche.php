<?php

namespace App\Entity;

use App\Repository\AfficheRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AfficheRepository::class)
 */
class Affiche
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Tournoi::class, inversedBy="affiches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tournoi;

    /**
     * @ORM\ManyToOne(targetEntity=Athlete::class, inversedBy="affiches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adversaire1;

    /**
     * @ORM\ManyToOne(targetEntity=Athlete::class, inversedBy="affiches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adversaire2;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $resultat;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $calendrier;

    public function __toString()
    {
        return $this->adversaire1.' VS '.$this->adversaire2;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTournoi(): ?Tournoi
    {
        return $this->tournoi;
    }

    public function setTournoi(?Tournoi $tournoi): self
    {
        $this->tournoi = $tournoi;

        return $this;
    }

    public function getAdversaire1(): ?Athlete
    {
        return $this->adversaire1;
    }

    public function setAdversaire1(?Athlete $adversaire1): self
    {
        $this->adversaire1 = $adversaire1;

        return $this;
    }

    public function getAdversaire2(): ?Athlete
    {
        return $this->adversaire2;
    }

    public function setAdversaire2(?Athlete $adversaire2): self
    {
        $this->adversaire2 = $adversaire2;

        return $this;
    }

    public function getResultat(): ?string
    {
        return $this->resultat;
    }

    public function setResultat(?string $resultat): self
    {
        $this->resultat = $resultat;

        return $this;
    }

    public function getCalendrier(): ?\DateTimeInterface
    {
        return $this->calendrier;
    }

    public function setCalendrier(?\DateTimeInterface $calendrier): self
    {
        $this->calendrier = $calendrier;

        return $this;
    }
}
