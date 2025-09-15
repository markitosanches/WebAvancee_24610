<?php

class Magique{

    public function getClassName():string{
        return "le nom de la classe est ". __CLASS__."<br/>";
    }

    public function getLine():string{
        return "la ligne de la classe est ". __LINE__."<br/>";
    }

    public function getFile():string{
        return "le fichier de la classe est ". __FILE__."<br/>";
    }

    public function getMethod():string{
        return "la methode de la classe est ". __METHOD__."<br/>";
    }
}

?>