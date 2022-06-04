<?php

namespace App\Entity;

use App\Repository\WorkerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkerRepository::class)
 */
class Worker
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
    private $WorkerFirstName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $WorkerMiddleName;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $WorkerLastName;

    /**
     * @ORM\Column(type="string", length=11)
     */
    private $WorkerPhone;

    /**
     * @ORM\ManyToOne(targetEntity=Bay::class, inversedBy="Worker")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Bay;

    /**
     * @ORM\ManyToOne(targetEntity=TypeOfWork::class, inversedBy="Worker")
     */
    private $TypeOfWork;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="Worker")
     */
    private $Service;

    public function __construct()
    {
        $this->Service = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWorkerFirstName(): ?string
    {
        return $this->WorkerFirstName;
    }

    public function setWorkerFirstName(string $WorkerFirstName): self
    {
        $this->WorkerFirstName = $WorkerFirstName;

        return $this;
    }

    public function getWorkerMiddleName(): ?string
    {
        return $this->WorkerMiddleName;
    }

    public function setWorkerMiddleName(string $WorkerMiddleName): self
    {
        $this->WorkerMiddleName = $WorkerMiddleName;

        return $this;
    }

    public function getWorkerLastName(): ?string
    {
        return $this->WorkerLastName;
    }

    public function setWorkerLastName(string $WorkerLastName): self
    {
        $this->WorkerLastName = $WorkerLastName;

        return $this;
    }

    public function getWorkerPhone(): ?string
    {
        return $this->WorkerPhone;
    }

    public function setWorkerPhone(string $WorkerPhone): self
    {
        $this->WorkerPhone = $WorkerPhone;

        return $this;
    }

    public function getBay(): ?Bay
    {
        return $this->Bay;
    }

    public function setBay(?Bay $Bay): self
    {
        $this->Bay = $Bay;

        return $this;
    }

    public function getTypeOfWork(): ?TypeOfWork
    {
        return $this->TypeOfWork;
    }

    public function setTypeOfWork(?TypeOfWork $TypeOfWork): self
    {
        $this->TypeOfWork = $TypeOfWork;

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
            $service->setWorker($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->Service->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getWorker() === $this) {
                $service->setWorker(null);
            }
        }

        return $this;
    }
}
