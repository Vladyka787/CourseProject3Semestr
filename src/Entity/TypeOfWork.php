<?php

namespace App\Entity;

use App\Repository\TypeOfWorkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=Worker::class, mappedBy="TypeOfWork")
     */
    private $Worker;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="TypeOfWork", orphanRemoval=true)
     */
    private $Service;

    public function __construct()
    {
        $this->Worker = new ArrayCollection();
        $this->Service = new ArrayCollection();
    }

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
            $worker->setTypeOfWork($this);
        }

        return $this;
    }

    public function removeWorker(Worker $worker): self
    {
        if ($this->Worker->removeElement($worker)) {
            // set the owning side to null (unless already changed)
            if ($worker->getTypeOfWork() === $this) {
                $worker->setTypeOfWork(null);
            }
        }

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
            $service->setTypeOfWork($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->Service->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getTypeOfWork() === $this) {
                $service->setTypeOfWork(null);
            }
        }

        return $this;
    }
}
