<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $CustomerPhone;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $CustomerFirstName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $CustomerMiddleName;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $CustomerLastName;

    /**
     * @ORM\OneToMany(targetEntity=Custom::class, mappedBy="Client", orphanRemoval=true)
     */
    private $Custom;

    public function __construct()
    {
        $this->Custom = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerPhone(): ?string
    {
        return $this->CustomerPhone;
    }

    public function setCustomerPhone(string $CustomerPhone): self
    {
        $this->CustomerPhone = $CustomerPhone;

        return $this;
    }

    public function getCustomerFirstName(): ?string
    {
        return $this->CustomerFirstName;
    }

    public function setCustomerFirstName(string $CustomerFirstName): self
    {
        $this->CustomerFirstName = $CustomerFirstName;

        return $this;
    }

    public function getCustomerMiddleName(): ?string
    {
        return $this->CustomerMiddleName;
    }

    public function setCustomerMiddleName(string $CustomerMiddleName): self
    {
        $this->CustomerMiddleName = $CustomerMiddleName;

        return $this;
    }

    public function getCustomerLastName(): ?string
    {
        return $this->CustomerLastName;
    }

    public function setCustomerLastName(?string $CustomerLastName): self
    {
        $this->CustomerLastName = $CustomerLastName;

        return $this;
    }

    /**
     * @return Collection<int, Custom>
     */
    public function getCustom(): Collection
    {
        return $this->Custom;
    }

    public function addCustom(Custom $custom): self
    {
        if (!$this->Custom->contains($custom)) {
            $this->Custom[] = $custom;
            $custom->setClient($this);
        }

        return $this;
    }

    public function removeCustom(Custom $custom): self
    {
        if ($this->Custom->removeElement($custom)) {
            // set the owning side to null (unless already changed)
            if ($custom->getClient() === $this) {
                $custom->setClient(null);
            }
        }

        return $this;
    }
}
