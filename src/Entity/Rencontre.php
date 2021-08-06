<?php

namespace App\Entity;

use App\Repository\RencontreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RencontreRepository::class)
 */
class Rencontre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Tournoi::class, inversedBy="rencontres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tournoi;

    /**
     * @ORM\ManyToMany(targetEntity=Athlete::class, inversedBy="rencontres")
     */
    private $adversaire1;

    public function __construct()
    {
        $this->adversaire1 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSport(): ?Sport
    {
        return $this->sport;
    }

    public function setSport(?Sport $sport): self
    {
        $this->sport = $sport;

        return $this;
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

    /**
     * @return Collection|Athlete[]
     */
    public function getAdversaire1(): Collection
    {
        return $this->adversaire1;
    }

    public function addAdversaire1(Athlete $adversaire1): self
    {
        if (!$this->adversaire1->contains($adversaire1)) {
            $this->adversaire1[] = $adversaire1;
        }

        return $this;
    }

    public function removeAdversaire1(Athlete $adversaire1): self
    {
        $this->adversaire1->removeElement($adversaire1);

        return $this;
    }
}
