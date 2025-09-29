<?php

// print_r($_POST);
require_once('classes/crud.php');

$crud = new CRUD;
$insert = $crud->insert('client', $_POST);

// echo "<pre>";
// var_dump($insert);
// echo "</pre>";

header("location:client-show.php?id=$insert"); 

?>
