<?php

print_r($_GET);
echo "<br>";
//$id = $_GET['id'];

extract($_GET);

echo $id;

?>