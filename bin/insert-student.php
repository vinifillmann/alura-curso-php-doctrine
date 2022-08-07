<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Doctrine\Entity\{Student, Phone};
use Alura\Doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();

$telefone = new Phone("(51) 9 9936-4030");
$entityManager->persist($telefone);

$student = new Student("Aluno com telefone");
$student->addPhone($telefone);

$entityManager->persist($student);
$entityManager->flush();