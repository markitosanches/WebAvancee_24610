<?php

require_once('classes/EnfantClass.php');


// $obj_parent = new ParentClass;

// echo "<pre>";
// var_dump($obj_parent );
// echo "</pre>";
// echo "<hr/>";


$obj_enfant = new EnfantClass;
$obj_enfant->setName("Peter");
echo "<pre>";
var_dump($obj_enfant );
echo "</pre>";
echo "<hr/>";