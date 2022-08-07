<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\{Entity, Column, Id, GeneratedValue, ManyToMany, OneToMany};

#[Entity]
class Student
{
    #[Id, GeneratedValue, Column]
    private int $id;

    #[OneToMany("student",targetEntity: Phone::class, cascade: ["persist", "remove"])]
    private Collection $phones;

    #[ManyToMany(Course::class, inversedBy: "students")]
    private Collection $courses;

    #[Column]
    private string $name;


    public function __construct(string $name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
        $this->courses = new ArrayCollection();
    }

    public function addPhone(Phone $phone): void
    {
        $this->phones->add($phone);
        $phone->setStudent($this);
    }

    public function phones(): Collection
    {
        return $this->phones;
    }

    public function courses(): Collection
    {
        return $this->courses;
    }

    public function enrollInCourse(Course $course): void
    {
        if ($this->courses->contains($course)) {
            return;
        }

        $this->courses->add($course);
        $course->addStudent($this);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $newName): void
    {
        if (trim($newName)) {
            $this->name = $newName;
        }
    }
}