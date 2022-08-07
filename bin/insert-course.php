<?php

require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Helper\EntityManagerCreator;


$entityManager = EntityManagerCreator::createEntityManager();

$course = new Course($argv[1]);

$entityManager->persist($course);
$entityManager->flush();