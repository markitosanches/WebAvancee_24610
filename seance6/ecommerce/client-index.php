<?php
require_once('db/connex.php');

$sql = "SELECT * FROM client";
$stmt = $pdo->query($sql);
// $clients = $stmt->fetchAll();

//     echo "<pre>";
//     var_dump($clients);
//     print_r($clients);
//     echo "</pre>";
    

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
        foreach($stmt as $row){
        ?>
        <tr>
            <td><a href="client-show.php?id=<?= $row['id']; ?>"><?= $row['name'];?></a></td>
            <td><?= $row['address'];?></td>
            <td><?= $row['email'];?></td>
            <td><?= $row['phone'];?></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <br><br>
    <a href="client-create.php" class="btn">New Client</a>
    
</body>
</html>