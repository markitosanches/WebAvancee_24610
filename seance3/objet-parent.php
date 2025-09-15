<?php

require_once('classes/ParentPerson.php');


$obj_person = new ParentPerson;

$obj_person->name = "Peter";
$obj_person->address = "Pie IX";
$obj_person->setPhone("514-777-7777");
$obj_person->country = "France";
$obj_person->setLanguage();


echo "<pre>";
var_dump($obj_person);
echo "</pre>";

?>