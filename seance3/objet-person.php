<?php
require_once('classes/Person.php');


$obj = new Person("Lisa");

$obj->setAddress("Pie Ix");

//prop
//$obj->name = "Peter";

// method()
// $obj->setName("Peter");



echo "<pre>";
var_dump($obj);
echo "</pre>";
