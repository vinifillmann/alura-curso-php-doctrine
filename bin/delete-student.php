<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();
$student = $entityManager->getPartialReference(Student::class, $argv[1]);

$entityManager->remove($student);
$entityManager->flush();