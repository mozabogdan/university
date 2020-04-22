<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TaxRepository")
 */
class Tax
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @ORM\Column(type="integer")
     */
    private $penalty;

    /**
     * @ORM\Column(type="integer")
     */
    private $discount;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialisation", inversedBy="taxes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialisation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="taxes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserTax", mappedBy="tax")
     */
    private $userTaxes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TaxType", inversedBy="taxes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    public function __construct()
    {
        $this->userTaxes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPenalty(): ?int
    {
        return $this->penalty;
    }

    public function setPenalty(int $penalty): self
    {
        $this->penalty = $penalty;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getSpecialisation(): ?Specialisation
    {
        return $this->specialisation;
    }

    public function setSpecialisation(?Specialisation $specialisation): self
    {
        $this->specialisation = $specialisation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|UserTax[]
     */
    public function getUserTaxes(): Collection
    {
        return $this->userTaxes;
    }

    public function addUserTax(UserTax $userTax): self
    {
        if (!$this->userTaxes->contains($userTax)) {
            $this->userTaxes[] = $userTax;
            $userTax->setTax($this);
        }

        return $this;
    }

    public function removeUserTax(UserTax $userTax): self
    {
        if ($this->userTaxes->contains($userTax)) {
            $this->userTaxes->removeElement($userTax);
            // set the owning side to null (unless already changed)
            if ($userTax->getTax() === $this) {
                $userTax->setTax(null);
            }
        }

        return $this;
    }

    public function getType(): ?TaxType
    {
        return $this->type;
    }

    public function setType(?TaxType $type): self
    {
        $this->type = $type;

        return $this;
    }
}
