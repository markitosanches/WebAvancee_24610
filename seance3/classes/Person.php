<?php

class Person{
    private string $name;
    public string $address;
    public string $zipCode;
    // public string $birthDay;
    // private int $age;

    public function __construct($name){
        $this->setName($name);
    }
    
    public function __destruct(){
        echo "Salut je suis $this->name et mon adresse est le $this->address!";
    }

    public function setName(string $name):void{
        $this->name = $name;
    }

    public function getName():string{
        return $this->name;
    }

   public function setAddress(string $address):void{
        $this->address = $address;
    }

    // public function calcAge(){
    //     $this->age = today()-$this->birthday;
    // }



}


?>