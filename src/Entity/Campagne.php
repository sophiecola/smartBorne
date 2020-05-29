<?php

namespace App\Entity;

use App\Repository\BorneCampagneRepository;
use App\Repository\CampagneRepository;
use App\Repository\MagasinCampagneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampagneRepository::class)
 */
class Campagne
{
    /**
     * @ORM\Id()
     * @ORM\Column(name="id", type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $media;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recurrence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $dureeAffichage;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $details;

    /**
     * @ORM\OneToMany(targetEntity=MagasinCampagne::class, mappedBy="uuidCampagne")
     */
    private $magasinCampagnes;

    /**
     * @ORM\OneToMany(targetEntity=BorneCampagne::class, mappedBy="uuidCampagne")
     */
    private $borneCampagnes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $permission;

    /**
     * @ORM\Column(type="time")
     */
    private $diffusionDebut;

    /**
     * @ORM\Column(type="time")
     */
    private $diffusionFin;

    public function __construct()
    {
        $this->magasinCampagnes = new ArrayCollection();
        $this->borneCampagnes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function setMedia($media): self
    {
        $this->media = $media;

        return $this;
    }

    public function getRecurrence()
    {
        return $this->recurrence;
    }

    public function setRecurrence($recurrence): self
    {
        $this->recurrence = $recurrence;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getDureeAffichage(): ?\DateTimeInterface
    {
        return $this->dureeAffichage;
    }

    public function setDureeAffichage(?\DateTimeInterface $dureeAffichage): self
    {
        $this->dureeAffichage = $dureeAffichage;

        return $this;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(?string $details): self
    {
        $this->details = $details;

        return $this;
    }

    /**
     * @return Collection|MagasinCampagne[]
     */
    public function getMagasinCampagnes(): Collection
    {
        return $this->magasinCampagnes;
    }

    public function addMagasinCampagne(MagasinCampagne $magasinCampagne): self
    {
        if (!$this->magasinCampagnes->contains($magasinCampagne)) {
            $this->magasinCampagnes[] = $magasinCampagne;
            $magasinCampagne->setUuidCampagne($this);
        }

        return $this;
    }

    public function removeMagasinCampagne(MagasinCampagne $magasinCampagne): self
    {
        if ($this->magasinCampagnes->contains($magasinCampagne)) {
            $this->magasinCampagnes->removeElement($magasinCampagne);
            // set the owning side to null (unless already changed)
            if ($magasinCampagne->getUuidCampagne() === $this) {
                $magasinCampagne->setUuidCampagne(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BorneCampagne[]
     */
    public function getBorneCampagnes(): Collection
    {
        return $this->borneCampagnes;
    }

    public function addBorneCampagne(BorneCampagne $borneCampagne): self
    {
        if (!$this->borneCampagnes->contains($borneCampagne)) {
            $this->borneCampagnes[] = $borneCampagne;
            $borneCampagne->setUuidCampagne($this);
        }

        return $this;
    }

    public function removeBorneCampagne(BorneCampagne $borneCampagne): self
    {
        if ($this->borneCampagnes->contains($borneCampagne)) {
            $this->borneCampagnes->removeElement($borneCampagne);
            // set the owning side to null (unless already changed)
            if ($borneCampagne->getUuidCampagne() === $this) {
                $borneCampagne->setUuidCampagne(null);
            }
        }

        return $this;
    }

    public function getPermission(): ?string
    {
        return $this->permission;
    }

    public function setPermission(string $permission): self
    {
        $this->permission = $permission;

        return $this;
    }

    public function getDiffusionDebut(): ?\DateTimeInterface
    {
        return $this->diffusionDebut;
    }

    public function setDiffusionDebut(\DateTimeInterface $diffusionDebut): self
    {
        $this->diffusionDebut = $diffusionDebut;

        return $this;
    }

    public function getDiffusionFin(): ?\DateTimeInterface
    {
        return $this->diffusionFin;
    }

    public function setDiffusionFin(\DateTimeInterface $diffusionFin): self
    {
        $this->diffusionFin = $diffusionFin;

        return $this;
    }

    public function getCountBorne() {
        $count = count($this->borneCampagnes);
        return $count;
    }
}
