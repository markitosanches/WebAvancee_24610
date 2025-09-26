<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:client-index.php');
}

require_once('db/connex.php');
extract($_POST);
$sql = "DELETE FROM client WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(array($id));

$count = $stmt->rowCount();
if($count==1){
    header("location:client-index.php");
}else{
    print_r($stmt->errorInfo());
}
?>