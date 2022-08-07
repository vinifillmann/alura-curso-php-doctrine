<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Doctrine\Entity\{Student, Phone};
use Alura\Doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();

$student = new Student($argv[1]);

for ($i = 2; $i < sizeof($argv); $i++) {
    $numero = $argv[$i];
    if ($numero) {
        $student->addPhone(new Phone($numero));
    }
}

$entityManager->persist($student);
$entityManager->flush();