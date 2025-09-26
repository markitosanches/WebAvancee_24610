<?php

try{
    $dbhost = 'localhost';
    $dbname = 'ecommerce';
    $dbport = 3306;
    $dbuser = 'root';
    $dbpass = '';
    
    $pdo = new PDO("mysql:host=$dbhost;dbname=$dbname;port=$dbport;charset=utf8", $dbuser, $dbpass); 

    // echo "<pre>";
    // var_dump($pdo);
    // echo "</pre>";
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}




?>