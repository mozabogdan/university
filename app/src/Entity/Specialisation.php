<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialisationRepository")
 */
class Specialisation
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
     * @ORM\Column(type="string", length=255)
     */
    private $year;

    /**
     * @ORM\Column(type="integer")
     */
    private $taxAmount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $creditAmount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $discount;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Faculty", inversedBy="specialisations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $faculty;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tax", mappedBy="specialisation")
     */
    private $taxes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="specialisation")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StudyProgram", mappedBy="specialisation")
     */
    private $studyPrograms;

    public function __construct()
    {
        $this->taxes = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->studyPrograms = new ArrayCollection();
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

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getTaxAmount(): ?int
    {
        return $this->taxAmount;
    }

    public function setTaxAmount(int $taxAmount): self
    {
        $this->taxAmount = $taxAmount;

        return $this;
    }

    public function getCreditAmount(): ?int
    {
        return $this->creditAmount;
    }

    public function setCreditAmount(?int $creditAmount): self
    {
        $this->creditAmount = $creditAmount;

        return $this;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getFaculty(): ?Faculty
    {
        return $this->faculty;
    }

    public function setFaculty(?Faculty $faculty): self
    {
        $this->faculty = $faculty;

        return $this;
    }

    /**
     * @return Collection|Tax[]
     */
    public function getTaxes(): Collection
    {
        return $this->taxes;
    }

    public function addTax(Tax $tax): self
    {
        if (!$this->taxes->contains($tax)) {
            $this->taxes[] = $tax;
            $tax->setSpecialisation($this);
        }

        return $this;
    }

    public function removeTax(Tax $tax): self
    {
        if ($this->taxes->contains($tax)) {
            $this->taxes->removeElement($tax);
            // set the owning side to null (unless already changed)
            if ($tax->getSpecialisation() === $this) {
                $tax->setSpecialisation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addSpecialisation($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeSpecialisation($this);
        }

        return $this;
    }

    /**
     * @return Collection|StudyProgram[]
     */
    public function getStudyPrograms(): Collection
    {
        return $this->studyPrograms;
    }

    public function addStudyProgram(StudyProgram $studyProgram): self
    {
        if (!$this->studyPrograms->contains($studyProgram)) {
            $this->studyPrograms[] = $studyProgram;
            $studyProgram->setSpecialisation($this);
        }

        return $this;
    }

    public function removeStudyProgram(StudyProgram $studyProgram): self
    {
        if ($this->studyPrograms->contains($studyProgram)) {
            $this->studyPrograms->removeElement($studyProgram);
            // set the owning side to null (unless already changed)
            if ($studyProgram->getSpecialisation() === $this) {
                $studyProgram->setSpecialisation(null);
            }
        }

        return $this;
    }
}
