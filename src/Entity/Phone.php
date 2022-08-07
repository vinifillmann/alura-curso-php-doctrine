<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\{Entity, Column, Id, GeneratedValue, ManyToOne};

#[Entity]
class Phone
{
    #[Id, GeneratedValue, Column]
    private int $id;

    #[ManyToOne(Student::class, inversedBy: "phones")]
    private Student $student;

    #[Column]
    private string $number;

    public function __construct(string $number)
    {
        $this->number = $number;
    }

    public function setStudent(Student $student): void
    {
        $this->student = $student;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getStudent(): Student
    {
        return $this->student;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}