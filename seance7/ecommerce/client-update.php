<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:client-index.php');
}

//print_r($_POST);
// Array ( [id] => 4 [name] => Paul [address] => Notre dame [zip_code] => 0-90- [phone] => 90-90-9 [email] => paul@gmail.com )

require_once('db/connex.php');
extract($_POST);
$sql = "UPDATE client SET name = ? , address = ?, zip_code = ?, phone = ?, email = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($name, $address, $zip_code, $phone, $email, $id));

$count = $stmt->rowCount();
if($count==1){
    header("location:client-index.php");
}else{
    print_r($stmt->errorInfo());
}


?>