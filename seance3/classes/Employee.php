<?php
require_once('ParentPerson.php');

class Employee extends ParentPerson{
    public float $salary;

    // public function __construct($name, $salary){
    //     $this->name = $name;
    //     $this->salary = $salary;
    // }

        public function setPhone($phone){
        $this->phone = "+1".$phone;
    }
} 

?>