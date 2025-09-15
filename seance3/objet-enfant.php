<?php

require_once('classes/Client.php');
require_once('classes/Employee.php');


$obj_client = new Client('Lisa');


// $obj_client->name = "Lisa";
$obj_client->address = "Sherbrooke";
$obj_client->setPhone("514-888-8888");
$obj_client->country = "France";
$obj_client->setLanguage();
$obj_client->account = 54878;
echo $obj_client->getPhone();
$obj_client->language = "Portuguese";
echo $obj_client->language;

echo "<pre>";
var_dump($obj_client);
echo "</pre>";

echo "<hr/>";

$obj_emp = new Employee('Paul', 1400.99);
$obj_emp->setPhone("514-888-8888");

echo "<pre>";
var_dump($obj_emp);
echo "</pre>";

echo "<hr/>";


?>