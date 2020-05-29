<?php

namespace App\Entity;

use App\Repository\MagasinCampagneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MagasinCampagneRepository::class)
 */
class MagasinCampagne
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255)
     */
    private $uuidMagasin;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Campagne::class, inversedBy="magasinCampagnes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $uuidCampagne;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $magasinName;

    public function getUuidMagasin(): ?string
    {
        return $this->uuidMagasin;
    }

    public function getUuidCampagne(): ?Campagne
    {
        return $this->uuidCampagne;
    }

    public function setUuidMagasin(string $uuidMagasin): self
    {
        $this->uuidMagasin = $uuidMagasin;

        return $this;
    }

    public function setUuidCampagne(?Campagne $uuidCampagne): self
    {
        $this->uuidCampagne = $uuidCampagne;

        return $this;
    }

    public function getMagasinName(): ?string
    {
        return $this->magasinName;
    }

    public function setMagasinName(string $magasinName): self
    {
        $this->magasinName = $magasinName;

        return $this;
    }
}
