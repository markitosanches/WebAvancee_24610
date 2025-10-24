<?php
namespace App\Models;

abstract class CRUD extends \PDO {

    final public function __construct(){
        parent::__construct('mysql:host=localhost; dbname=ecommerce; port=3306; charset=utf8', 'root', '');
    }

    final public function select( $field = null, $order = 'ASC'){
        if($field == null){
            $field = $this->primaryKey;
        }
        $sql = "SELECT * FROM $this->table ORDER BY $field $order";
        // return  $sql;
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    final public function selectId($value){
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        }    
    }

    final public function insert($data){

        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($fieldName) VALUES ($fieldValue)";

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        return $this->lastInsertId();
    }
    
    public function update($data, $id){

        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);

        // UPDATE client SET id = :id, name = :name, address = :address, zip_code = :zip_code, phone = :phone, email = :email WHERE id = :id

        $fieldName = null;
        foreach($data as $key=>$value){
            $fieldName .= "$key = :$key, ";
        } 
        
        $fieldName = rtrim($fieldName, ', ');

            //Array ( [name] => Peter [address] => 90, 5 Avenue [zip_code] => 59800 [phone] => 555-888-77777 [email] => peter@test.ca [city_id] => 3 )
        //return $data;

        //return $id;

        $sql = "UPDATE $this->table SET $fieldName WHERE $this->primaryKey = :$this->primaryKey";

        // UPDATE client SET name = :name, address = :address, zip_code = :zip_code, phone = :phone, email = :email, city_id = :city_id WHERE id = :id
        // return $sql;
        $data[$this->primaryKey]=$id;

        // Array ( [name] => Peter [address] => 90, 5 Avenue [zip_code] => 59800 [phone] => 555-888-77777 [email] => peter@test.ca [city_id] => 3 [id] => 1 )
        // return $data;

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
    public function delete($value){
        // DELETE FROM client WHERE id = :id;

        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue("$this->primaryKey", $value);
        $stmt->execute();
        if($stmt){
            return true;
        }else{
            return false;
        }

    }

}