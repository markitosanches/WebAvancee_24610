<?php

require_once('classes/Person.php');

require_once('classes/Student.php');

require_once('classes/Teacher.php');

$person = new Person;
$person->setName('Peter');
$person->setPhone('514-777-8888');

echo "<pre>";
var_dump($person);
echo "</pre>";
echo "<br>";
echo "Salut ".$person->getName();

echo "<hr/>";

$student = new Student;

$student->setName('Lisa');
echo "<pre>";
var_dump($student);
echo "</pre>";
echo "<br>";
echo "Salut ".$student->getName();
echo "<hr/>";

$teacher = new Teacher;

$teacher->setName('Annie');
$teacher->setId(15);
$teacher->calcSalary(5.2);

echo "<pre>";
var_dump($teacher);
echo "</pre>";
echo "<br>";
echo "Salut ".$teacher->getName();
echo "Salut ".$teacher->getNames();
echo "<hr/>";
?>