<?php
require_once('classes/Person.php');

class Student extends Person{
    private int $idStudent;

    public function __construct(){
        $this->idStudent = rand(1, 100);
    }
}


?>