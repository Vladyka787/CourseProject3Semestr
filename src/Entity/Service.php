<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ServiceDescription;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $ServicePrice;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $ServiceCompleteDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getServiceDescription(): ?string
    {
        return $this->ServiceDescription;
    }

    public function setServiceDescription(?string $ServiceDescription): self
    {
        $this->ServiceDescription = $ServiceDescription;

        return $this;
    }

    public function getServicePrice(): ?string
    {
        return $this->ServicePrice;
    }

    public function setServicePrice(string $ServicePrice): self
    {
        $this->ServicePrice = $ServicePrice;

        return $this;
    }

    public function getServiceCompleteDate(): ?\DateTimeInterface
    {
        return $this->ServiceCompleteDate;
    }

    public function setServiceCompleteDate(?\DateTimeInterface $ServiceCompleteDate): self
    {
        $this->ServiceCompleteDate = $ServiceCompleteDate;

        return $this;
    }
}
