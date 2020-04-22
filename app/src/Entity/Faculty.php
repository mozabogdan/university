<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FacultyRepository")
 */
class Faculty
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
     * @ORM\OneToMany(targetEntity="App\Entity\Specialisation", mappedBy="faculty", orphanRemoval=true)
     */
    private $specialisations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\StudyProgram", mappedBy="faculty")
     */
    private $studyPrograms;

    public function __construct()
    {
        $this->specialisations = new ArrayCollection();
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

    /**
     * @return Collection|Specialisation[]
     */
    public function getSpecialisations(): Collection
    {
        return $this->specialisations;
    }

    public function addSpecialisation(Specialisation $specialisation): self
    {
        if (!$this->specialisations->contains($specialisation)) {
            $this->specialisations[] = $specialisation;
            $specialisation->setFaculty($this);
        }

        return $this;
    }

    public function removeSpecialisation(Specialisation $specialisation): self
    {
        if ($this->specialisations->contains($specialisation)) {
            $this->specialisations->removeElement($specialisation);
            // set the owning side to null (unless already changed)
            if ($specialisation->getFaculty() === $this) {
                $specialisation->setFaculty(null);
            }
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
            $studyProgram->setFaculty($this);
        }

        return $this;
    }

    public function removeStudyProgram(StudyProgram $studyProgram): self
    {
        if ($this->studyPrograms->contains($studyProgram)) {
            $this->studyPrograms->removeElement($studyProgram);
            // set the owning side to null (unless already changed)
            if ($studyProgram->getFaculty() === $this) {
                $studyProgram->setFaculty(null);
            }
        }

        return $this;
    }
}
