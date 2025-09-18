<?php

require_once('classes/Calculator.php');

$calc = new Calculator;
echo $calc->add(10, 5);

echo"<hr>";
echo"<strong>Method Static</strong><br>";

echo Calculator::add(15,20);

echo"<hr>";
echo"<strong>Method Property</strong><br>";

echo Calculator::$message;
