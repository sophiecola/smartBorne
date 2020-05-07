<?php

namespace App\Entity;

use App\Repository\BorneCampagneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=BorneCampagneRepository::class)
 */
class BorneCampagne
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", length=255)
     * @Assert\Uuid
     */
    private $uuidBorne;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity=Campagne::class, inversedBy="borneCampagnes")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\Uuid
     */
    private $uuidCampagne;


    public function getUuidBorne(): ?string
    {
        return $this->uuidBorne;
    }

    public function getUuidCampagne(): ?Campagne
    {
        return $this->uuidCampagne;
    }

    public function setUuidBorne(string $uuidBorne): self
    {
        $this->uuidBorne = $uuidBorne;

        return $this;
    }

    public function setUuidCampagne(?Campagne $uuidCampagne): self
    {
        $this->uuidCampagne = $uuidCampagne;

        return $this;
    }
}
