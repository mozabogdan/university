<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $cnp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $fatherInitial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalCredits;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $studentStatus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserType", inversedBy="users", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StudyProgram", mappedBy="user")
     */
    private $studyPrograms;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tax", mappedBy="user")
     */
    private $taxes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserTax", mappedBy="user")
     */
    private $userTaxes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Specialisation", inversedBy="users", cascade={"persist"})
     */
    private $specialisation;

    public function __construct()
    {
        $this->studyPrograms    = new ArrayCollection();
        $this->taxes            = new ArrayCollection();
        $this->userTaxes        = new ArrayCollection();
        $this->specialisation   = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCnp(): ?string
    {
        return $this->cnp;
    }

    public function setCnp(string $cnp): self
    {
        $this->cnp = $cnp;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFatherInitial(): ?string
    {
        return $this->fatherInitial;
    }

    public function setFatherInitial(string $fatherInitial): self
    {
        $this->fatherInitial = $fatherInitial;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTotalCredits(): ?int
    {
        return $this->totalCredits;
    }

    public function setTotalCredits(int $totalCredits): self
    {
        $this->totalCredits = $totalCredits;

        return $this;
    }

    public function getStudentStatus(): ?string
    {
        return $this->studentStatus;
    }

    public function setStudentStatus(string $studentStatus): self
    {
        $this->studentStatus = $studentStatus;

        return $this;
    }

    public function getType(): ?UserType
    {
        return $this->type;
    }

    public function setType(?UserType $type): self
    {
        $this->type = $type;

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
            $studyProgram->setUser($this);
        }

        return $this;
    }

    public function removeStudyProgram(StudyProgram $studyProgram): self
    {
        if ($this->studyPrograms->contains($studyProgram)) {
            $this->studyPrograms->removeElement($studyProgram);
            // set the owning side to null (unless already changed)
            if ($studyProgram->getUser() === $this) {
                $studyProgram->setUser(null);
            }
        }

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
            $tax->setUser($this);
        }

        return $this;
    }

    public function removeTax(Tax $tax): self
    {
        if ($this->taxes->contains($tax)) {
            $this->taxes->removeElement($tax);
            // set the owning side to null (unless already changed)
            if ($tax->getUser() === $this) {
                $tax->setUser(null);
            }
        }

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
            $userTax->setUser($this);
        }

        return $this;
    }

    public function removeUserTax(UserTax $userTax): self
    {
        if ($this->userTaxes->contains($userTax)) {
            $this->userTaxes->removeElement($userTax);
            // set the owning side to null (unless already changed)
            if ($userTax->getUser() === $this) {
                $userTax->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Specialisation[]
     */
    public function getSpecialisation(): Collection
    {
        return $this->specialisation;
    }

    public function addSpecialisation(Specialisation $specialisation): self
    {
        if (!$this->specialisation->contains($specialisation)) {
            $this->specialisation[] = $specialisation;
        }

        return $this;
    }

    public function removeSpecialisation(Specialisation $specialisation): self
    {
        if ($this->specialisation->contains($specialisation)) {
            $this->specialisation->removeElement($specialisation);
        }

        return $this;
    }
}
