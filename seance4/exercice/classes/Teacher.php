<?php
require_once('classes/Person.php');

class Teacher extends Person{
    private int $idTeacher;
    private float $salary;

    public function setId(int $id){
        $this->idTeacher = $id;
    }

    public function calcSalary(float $hours){
        $this->salary = $hours*20;
    }

    // public function getName(): string{
    //     return "The teacher's name is";
    // }
}
?>
