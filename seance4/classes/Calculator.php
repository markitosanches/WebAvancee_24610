<?php

class Calculator{

    static public string $message = "The result is: ";

    static public function add($a, $b){
        return self::$message.$a+$b;
    }

}



?>