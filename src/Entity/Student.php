<?php

namespace Alura\Doctrine\Entity;

use Doctrine\ORM\Mapping\{Entity, Column, Id, GeneratedValue};

#[Entity]
class Student
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;
    #[Column]
    private string $name;


    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}