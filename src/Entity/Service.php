<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToOne(targetEntity=Custom::class, inversedBy="Service")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Custom;

    /**
     * @ORM\ManyToOne(targetEntity=Bay::class, inversedBy="Service")
     */
    private $Bay;

    /**
     * @ORM\ManyToOne(targetEntity=TypeOfWork::class, inversedBy="Service")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TypeOfWork;

    /**
     * @ORM\ManyToOne(targetEntity=Worker::class, inversedBy="Service")
     */
    private $Worker;

    /**
     * @ORM\OneToMany(targetEntity=Material::class, mappedBy="Service")
     */
    private $Material;

    public function __construct()
    {
        $this->Material = new ArrayCollection();
    }

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

    public function getCustom(): ?Custom
    {
        return $this->Custom;
    }

    public function setCustom(?Custom $Custom): self
    {
        $this->Custom = $Custom;

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

    public function getWorker(): ?Worker
    {
        return $this->Worker;
    }

    public function setWorker(?Worker $Worker): self
    {
        $this->Worker = $Worker;

        return $this;
    }

    /**
     * @return Collection<int, Material>
     */
    public function getMaterial(): Collection
    {
        return $this->Material;
    }

    public function addMaterial(Material $material): self
    {
        if (!$this->Material->contains($material)) {
            $this->Material[] = $material;
            $material->setService($this);
        }

        return $this;
    }

    public function removeMaterial(Material $material): self
    {
        if ($this->Material->removeElement($material)) {
            // set the owning side to null (unless already changed)
            if ($material->getService() === $this) {
                $material->setService(null);
            }
        }

        return $this;
    }
}
