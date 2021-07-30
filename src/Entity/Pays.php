<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
//use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=PaysRepository::class)
 */
class Pays
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capitale;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $forme_courte;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $forme_longue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $drapeau;

    /**
     * @ORM\OneToMany(targetEntity=Athlete::class, mappedBy="origine")
     */
    private $athletes;


    public function __construct()
    {
        $this->athletes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCapitale(): ?string
    {
        return $this->capitale;
    }

    public function setCapitale(string $capitale): self
    {
        $this->capitale = $capitale;

        return $this;
    }

    public function getFormeCourte(): ?string
    {
        return $this->forme_courte;
    }

    public function setFormeCourte(?string $forme_courte): self
    {
        $this->forme_courte = $forme_courte;

        return $this;
    }

    public function getFormeLongue(): ?string
    {
        return $this->forme_longue;
    }

    public function setFormeLongue(string $forme_longue): self
    {
        $this->forme_longue = $forme_longue;

        return $this;
    }

    public function getDrapeau(): ?string
    {
        return $this->drapeau;
    }

    public function setDrapeau(?string $drapeau): self
    {
        $this->drapeau = $drapeau;

        return $this;
    }

    /**
     * @return Collection|Athlete[]
     */
    public function getAthletes(): Collection
    {
        return $this->athletes;
    }

    public function addAthlete(Athlete $athlete): self
    {
        if (!$this->athletes->contains($athlete)) {
            $this->athletes[] = $athlete;
            $athlete->setOrigine($this);
        }

        return $this;
    }

    public function removeAthlete(Athlete $athlete): self
    {
        if ($this->athletes->removeElement($athlete)) {
            // set the owning side to null (unless already changed)
            if ($athlete->getOrigine() === $this) {
                $athlete->setOrigine(null);
            }
        }

        return $this;
    }

}
