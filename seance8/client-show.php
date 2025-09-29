<?php

if(isset($_GET['id']) && $_GET['id']!=null){
    $id = $_GET['id'];

    require_once('classes/crud.php');

    $crud = new CRUD;
    $client = $crud->selectId('client', $id);

    // echo "<pre>";
    // var_dump($client);
    // echo "</pre>";
    // die();

    if($client){
        // print_r($client);
        // $name = $client['name'];
        // foreach($client as $key=>$value){
        //     $$key=$value;
        // }
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