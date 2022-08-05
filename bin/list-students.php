<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    $id = $student->getId();
    $name = $student->getName();
    echo "ID: {$id}\nNome: {$name}\n\n";
}

echo $studentRepository->count([]) . PHP_EOL;