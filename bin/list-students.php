<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Doctrine\Entity\{Course, Student, Phone};
use Alura\Doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

$studentList = $studentRepository->findAll();

echo PHP_EOL;

foreach ($studentList as $student) {
    $id = $student->getId();
    $name = $student->getName();
    echo "ID: {$id}\nNome: {$name}\n";

    if ($student->phones()->count() > 0) {
        echo "Telefones: ";
        echo implode(", ", $student->phones()->map(fn (Phone $phone) => $phone->getNumber())->toArray());
        echo PHP_EOL;
    }
    
    if ($student->courses()->count() > 0) {
        echo "Cursos: ";
        echo implode(", ", $student->courses()->map(fn (Course $course) => $course->getName())->toArray());
    }

    echo PHP_EOL . PHP_EOL;
}

echo $studentRepository->count([]) . PHP_EOL;