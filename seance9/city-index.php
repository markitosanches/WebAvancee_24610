<?php

require_once('classes/crud.php');

$crud = new CRUD;
$cities = $crud->select('city', 'city', 'desc');

// echo "<pre>";
// var_dump($cities);
// echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>City List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>City List</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
        </tr>
        <?php
        foreach($cities as $city){
        ?>
        <tr>
            <td><?= $city['id'];?></td>
            <td><?= $city['city'];?></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <br><br>
     
</body>
</html>