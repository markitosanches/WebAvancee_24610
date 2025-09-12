<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require_once('classes/Person.php');


$objet1 = new Person;

//$objet1->name = "Peter";
$objet1->setName('Lisa');

$objet1->id = 10;

echo "<pre>";
var_dump($objet1);
echo "</pre>";
print_r($objet1);
echo "<br>";

$objet1->zipCode="H3G 1A9";

// echo $objet1->name;
echo $objet1->getName();
echo "<br>";
echo $objet1->zipCode;
echo "<hr>";

$peter  = new Person;


$peter->setName('Peter');
$peter->setCoord('', '', '5148888888');

echo "<pre>";
var_dump($peter);
echo "</pre>";
print_r($peter);
echo "<hr>";


$objet3 = new Person('Paul');

echo "<pre>";
var_dump($objet3);
echo "</pre>";
print_r($objet3);
echo "<hr>";

?>