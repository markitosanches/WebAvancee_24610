<?php

require_once('classes/Magique.php');

$mag = new Magique;

echo $mag->getClassName();

echo $mag->getLine();
echo $mag->getFile();
echo $mag->getMethod();

?>