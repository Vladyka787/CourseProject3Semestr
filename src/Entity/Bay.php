<?php

namespace App\Entity;

use App\Repository\BayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="Bay")
     */
    private $Service;

    /**
     * @ORM\OneToMany(targetEntity=Worker::class, mappedBy="Bay")
     */
    private $Worker;

    public function __construct()
    {
        $this->Service = new ArrayCollection();
        $this->Worker = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Service>
     */
    public function getService(): Collection
    {
        return $this->Service;
    }

    public function addService(Service $service): self
    {
        if (!$this->Service->contains($service)) {
            $this->Service[] = $service;
            $service->setBay($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->Service->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getBay() === $this) {
                $service->setBay(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Worker>
     */
    public function getWorker(): Collection
    {
        return $this->Worker;
    }

    public function addWorker(Worker $worker): self
    {
        if (!$this->Worker->contains($worker)) {
            $this->Worker[] = $worker;
            $worker->setBay($this);
        }

        return $this;
    }

    public function removeWorker(Worker $worker): self
    {
        if ($this->Worker->removeElement($worker)) {
            // set the owning side to null (unless already changed)
            if ($worker->getBay() === $this) {
                $worker->setBay(null);
            }
        }

        return $this;
    }
}
