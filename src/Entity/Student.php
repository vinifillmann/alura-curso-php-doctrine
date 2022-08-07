<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\{Entity, Column, Id, GeneratedValue, OneToMany};

#[Entity]
class Student
{
    #[Id, GeneratedValue, Column]
    private int $id;

    #[OneToMany("student",targetEntity: Phone::class)]
    private Collection $phones;

    #[Column]
    private string $name;


    public function __construct(string $name)
    {
        $this->name = $name;
        $this->phones = new ArrayCollection();
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