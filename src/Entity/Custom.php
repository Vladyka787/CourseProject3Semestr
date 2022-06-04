<?php

namespace App\Entity;

use App\Repository\CustomRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomRepository::class)
 */
class Custom
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $CarInformation;

    /**
     * @ORM\Column(type="date")
     */
    private $OrderDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $OrderEndDate;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $OrderPayDate;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="Custom")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarInformation(): ?string
    {
        return $this->CarInformation;
    }

    public function setCarInformation(string $CarInformation): self
    {
        $this->CarInformation = $CarInformation;

        return $this;
    }

    public function getOrderDate(): ?\DateTimeInterface
    {
        return $this->OrderDate;
    }

    public function setOrderDate(\DateTimeInterface $OrderDate): self
    {
        $this->OrderDate = $OrderDate;

        return $this;
    }

    public function getOrderEndDate(): ?\DateTimeInterface
    {
        return $this->OrderEndDate;
    }

    public function setOrderEndDate(?\DateTimeInterface $OrderEndDate): self
    {
        $this->OrderEndDate = $OrderEndDate;

        return $this;
    }

    public function getOrderPayDate(): ?\DateTimeInterface
    {
        return $this->OrderPayDate;
    }

    public function setOrderPayDate(?\DateTimeInterface $OrderPayDate): self
    {
        $this->OrderPayDate = $OrderPayDate;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): self
    {
        $this->Client = $Client;

        return $this;
    }
}
