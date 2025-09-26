<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:client-index.php');
}

require_once('db/connex.php');
//print_r($_POST);

// Array ( [name] => Peter [address] => Pie Ix [zip_code] => [phone] => [email] => )

// $name = $_POST['name']; 
// $address = $_POST['address']; 
// $email = $_POST['email'];
// ...

// foreach($_POST as $key=>$value){
//     $$key=$value;
// }

extract($_POST);

$sql = "INSERT INTO client (name, address, zip_code, email, phone) VALUES (?, ?, ?, ?, ?)"; 


$stmt = $pdo->prepare($sql);
if($stmt->execute(array($name, $address, $zip_code, $email, $phone))){
    $id = $pdo->lastInsertId();
    header('location:client-show.php?id='.$id);
}else{
    print_r($stmt->errorInfo());
}

?>