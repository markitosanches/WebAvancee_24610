<?php

class Person{
    private string $name;
    public string $address;
    public string $zipCode = "H1V 2H4";
    public string $phone;
    public string $email;
    public int $id;


    public function __construct($name = ''){
        $this->name = $name;
    }
   
    public function setName(string $name):void{
        $this->name = $name;
    }

     public function setCoord($address = '', $zipCode = '', $phone = '', $email = ''):void{
        $this->address = $address;
        $this->zipCode = $zipCode;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getName(){
        //return "Salut ".$this->name." comment ça va?";
        return "Salut $this->name comment ça va?";
    }
}

?>