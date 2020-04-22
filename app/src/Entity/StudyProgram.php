<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StudyProgramRepository")
 */
class StudyProgram
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
     * @ORM\Column(type="smallint")
     */
    private $semesterNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $creditNumber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Faculty", inversedBy="studyPrograms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $faculty;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="studyPrograms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialisation", inversedBy="studyPrograms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specialisation;

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

    public function getSemesterNumber(): ?int
    {
        return $this->semesterNumber;
    }

    public function setSemesterNumber(int $semesterNumber): self
    {
        $this->semesterNumber = $semesterNumber;

        return $this;
    }

    public function getCreditNumber(): ?int
    {
        return $this->creditNumber;
    }

    public function setCreditNumber(int $creditNumber): self
    {
        $this->creditNumber = $creditNumber;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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
}
