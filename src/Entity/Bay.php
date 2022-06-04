<?php

namespace App\Entity;

use App\Repository\BayRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BayRepository::class)
 */
class Bay
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $BayType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBayType(): ?string
    {
        return $this->BayType;
    }

    public function setBayType(string $BayType): self
    {
        $this->BayType = $BayType;

        return $this;
    }
}
