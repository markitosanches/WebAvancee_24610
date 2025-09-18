<?php

require_once('classes/Circle.php');
require_once('classes/Rectangle.php');

echo "<h1>Circle</h1>";

$circle = new Circle(2);

echo "The area is: ".$circle->calcArea();

echo "<pre>";
var_dump($circle);
echo "</pre>";

echo "<hr>";
echo "<h1>Rectangle</h1>";

$rectangle = new Rectangle(2, 10);
echo "The area is: ".$rectangle->calcArea();

echo "<pre>";
var_dump($rectangle);
echo "</pre>";

?>