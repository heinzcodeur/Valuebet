<?php

namespace App\Entity;

use App\Repository\AthleteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AthleteRepository::class)
 */
class Athlete
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
    private $first_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $last_name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birth_date;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $taille;

    /**
     * @ORM\ManyToOne(targetEntity=Sport::class, inversedBy="athletes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $discipline;

    /**
     * @ORM\ManyToOne(targetEntity=Pays::class, inversedBy="athletes")
     */
    private $origine;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="athletes")
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity=Rencontre::class, mappedBy="adversaire1")
     */
    private $rencontres;

    /**
     * @ORM\OneToMany(targetEntity=Affiche::class, mappedBy="adversaire1")
     */
    private $affiches;

    /**
     * @ORM\OneToMany(targetEntity=Favorite::class, mappedBy="athlete")
     */
    private $favorites;

    /**
     * @ORM\ManyToOne(targetEntity=Ranking::class, inversedBy="athletes")
     */
    private $ranking;

    public function __construct()
    {
        $this->rencontres = new ArrayCollection();
        $this->affiches = new ArrayCollection();
        $this->favorites = new ArrayCollection();
    }


    public function __toString()
    {
        return $this->last_name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birth_date;
    }

    public function setBirthDate(\DateTimeInterface $birth_date): self
    {
        $this->birth_date = $birth_date;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(?float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getDiscipline(): ?Sport
    {
        return $this->discipline;
    }

    public function setDiscipline(?Sport $discipline): self
    {
        $this->discipline = $discipline;

        return $this;
    }

    public function getOrigine(): ?Pays
    {
        return $this->origine;
    }

    public function setOrigine(?Pays $origine): self
    {
        $this->origine = $origine;

        return $this;
    }


    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|Rencontre[]
     */
    public function getRencontres(): Collection
    {
        return $this->rencontres;
    }

    public function addRencontre(Rencontre $rencontre): self
    {
        if (!$this->rencontres->contains($rencontre)) {
            $this->rencontres[] = $rencontre;
            $rencontre->addAdversaire1($this);
        }

        return $this;
    }

    public function removeRencontre(Rencontre $rencontre): self
    {
        if ($this->rencontres->removeElement($rencontre)) {
            $rencontre->removeAdversaire1($this);
        }

        return $this;
    }

    /**
     * @return Collection|Affiche[]
     */
    public function getAffiches(): Collection
    {
        return $this->affiches;
    }

    public function addAffich(Affiche $affich): self
    {
        if (!$this->affiches->contains($affich)) {
            $this->affiches[] = $affich;
            $affich->setAdversaire1($this);
        }

        return $this;
    }

    public function removeAffich(Affiche $affich): self
    {
        if ($this->affiches->removeElement($affich)) {
            // set the owning side to null (unless already changed)
            if ($affich->getAdversaire1() === $this) {
                $affich->setAdversaire1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Favorite[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }

    public function addFavorite(Favorite $favorite): self
    {
        if (!$this->favorites->contains($favorite)) {
            $this->favorites[] = $favorite;
            $favorite->setAthlete($this);
        }

        return $this;
    }

    public function removeFavorite(Favorite $favorite): self
    {
        if ($this->favorites->removeElement($favorite)) {
            // set the owning side to null (unless already changed)
            if ($favorite->getAthlete() === $this) {
                $favorite->setAthlete(null);
            }
        }

        return $this;
    }

    public function getRanking(): ?Ranking
    {
        return $this->ranking;
    }

    public function setRanking(?Ranking $ranking): self
    {
        $this->ranking = $ranking;

        return $this;
    }
}
