<?php

if(isset($_GET['id']) && $_GET['id']!=null){
//print_r($_GET);
//echo "<br>";
//$id = $_GET['id'];

    extract($_GET);
    // echo $id;
    require_once('db/connex.php');
    $sql = "SELECT * FROM client WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array($id));

    $count = $stmt->rowCount();

    // echo $count;
    if($count == 1){
        $client = $stmt->fetch();
        //print_r($client);
        extract($client);
    }else{
        header('location:client-index.php');
    }
}else{
    header('location:client-index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Client Show</title>
</head>
<body>
    <div class="container">
        <h1>Client Show</h1>
        <p><strong>Name: </strong><?= $name;?></p>
        <p><strong>Address: </strong><?= $address;?></p>
        <p><strong>Phone: </strong><?= $phone;?></p>
        <p><strong>Email: </strong><?= $email;?></p>
        <p><strong>Zip Code: </strong><?= $zip_code;?></p>
        <a href="client-edit.php?id=<?= $id;?>" class="btn block">Edit</a>
        <form action="client-delete.php" method="post">
                <input type="hidden" name="id" value="<?= $id;?>">
                <input type="submit" value="Delete" class="btn red">
        </form>
    </div>
</body>
</html>