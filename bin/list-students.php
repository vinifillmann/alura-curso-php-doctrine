<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Doctrine\Entity\{Student, Phone};
use Alura\Doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
    $id = $student->getId();
    $name = $student->getName();
    echo "ID: {$id}\nNome: {$name}\n";
    echo "Telefones: ";

    echo implode(", ", $student->phones()->map(fn (Phone $phone) => $phone->getNumber())->toArray());

    echo PHP_EOL;
}

echo $studentRepository->count([]) . PHP_EOL;