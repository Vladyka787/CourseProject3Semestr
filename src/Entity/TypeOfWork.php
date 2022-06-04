<?php

namespace App\Entity;

use App\Repository\TypeOfWorkRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeOfWorkRepository::class)
 */
class TypeOfWork
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
    private $TypeOfWorkName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $TypeOfWorkSkills;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeOfWorkName(): ?string
    {
        return $this->TypeOfWorkName;
    }

    public function setTypeOfWorkName(string $TypeOfWorkName): self
    {
        $this->TypeOfWorkName = $TypeOfWorkName;

        return $this;
    }

    public function getTypeOfWorkSkills(): ?string
    {
        return $this->TypeOfWorkSkills;
    }

    public function setTypeOfWorkSkills(string $TypeOfWorkSkills): self
    {
        $this->TypeOfWorkSkills = $TypeOfWorkSkills;

        return $this;
    }
}
