<?php
if(isset($_GET['id']) && $_GET['id']!=null){
    $id = $_GET['id'];

    require_once('classes/crud.php');
    $crud = new CRUD;
    $client = $crud->selectId('client', $id);
    $cities = $crud->select('city', 'city');

    if($client){
       // print_r($client);
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
    <title>Client Edit</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <form action="client-update.php" method="post">
            <h2>Update Client</h2>
            <input type="hidden" name="id" value="<?= $id;?>">
            <label>Name
                <input type="text" name="name" value="<?= $name;?>">
            </label>
            <label>Address
                <input type="text" name="address" value="<?= $address;?>">
            </label>
            <label>Zip Code
                <input type="text" name="zip_code" value="<?= $zip_code;?>">
            </label>
            <label>Phone
                <input type="text" name="phone" value="<?= $phone;?>">
            </label>
            <label>Email
                <input type="email" name="email" value="<?= $email;?>">
            </label>
            <label>City
                <select name="city_id">
                    <option value="">Select</option>
                    <?php
                    foreach($cities as $city){
                    ?>
                        <option value="<?= $city['id'];?>" <?php if($city['id'] == $city_id) {echo "selected";}?>><?= $city['city'];?> </option>
                    <?php 
                    }
                    ?>
                </select>
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
    </div> 
</body>
</html>