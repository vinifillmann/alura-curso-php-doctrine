<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\{Entity, Column, Id, GeneratedValue, ManyToMany};

#[Entity]
class Course
{
    #[Id, GeneratedValue, Column]
    private int $id;
    #[Column]
    private string $name;
    #[ManyToMany(Student::class, "courses")]
    private Collection $students;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->students = new ArrayCollection();
    }

    public function addStudent(Student $student): void
    {
        if ($this->students->contains($student)) {
            return;
        }
        
        $this->students->add($student);
        $student->enrollInCourse($this);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function students(): Collection
    {
        return $this->students;
    }
}