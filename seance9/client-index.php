<?php

require_once('classes/CRUD.php');

$crud = new CRUD;
// $clients = $crud->select('client');
$clients = $crud->select('client', 'name');

// echo "<pre>";
// var_dump($clients);
// echo "</pre>";
// die();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Client List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php
        foreach($clients as $client){
        ?>
        <tr>
            <td><a href="client-show.php?id=<?= $client['id']; ?>"><?= $client['name'];?></a></td>
            <td><?= $client['address'];?></td>
            <td><?= $client['email'];?></td>
            <td><?= $client['phone'];?></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <br><br>
    <a href="client-create.php" class="btn">New Client</a>
    
</body>
</html>