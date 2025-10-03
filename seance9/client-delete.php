<?php
require_once('classes/CRUD.php');
$id = $_POST['id'];
$crud = new CRUD;
$delete = $crud->delete('client', $id);
if($delete){
    header('location:client-index.php');
}else{
    echo "Error";
}