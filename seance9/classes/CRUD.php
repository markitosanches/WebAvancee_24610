<?php

class CRUD extends PDO {

    public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=ecommerce; port=3306; charset=utf8', 'root', '');
    }

    public function select($table, $field = 'id', $order = 'ASC'){
        $sql = "SELECT * FROM $table ORDER BY $field $order";
        // return  $sql;
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $field = 'id'){
        $sql = "SELECT * FROM $table WHERE $field = :$field";
        //return $sql;
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        }    
    }

    public function insert($table, $data){

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($fieldName) VALUES ($fieldValue)";
        // return $sql;
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $this->lastInsertId();
    }
 
    public function update($table, $data, $field = 'id'){

        // UPDATE client SET id = :id, name = :name, address = :address, zip_code = :zip_code, phone = :phone, email = :email WHERE id = :id

        $fieldName = null;
        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        } 
        
        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET  $fieldName WHERE $field = :$field";

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        if($stmt){
            return true;
        }else{
            return false;
        }
    }

    public function delete($table, $value, $field = 'id'){
        // DELETE FROM client WHERE id = :id;

        $sql = "DELETE FROM $table WHERE $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue("$field", $value);
        $stmt->execute();
        if($stmt){
            return true;
        }else{
            return false;
        }

    }
}
?>