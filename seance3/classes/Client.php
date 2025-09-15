<?php
require_once('ParentPerson.php');

class Client extends ParentPerson{
    public int $account;

    public function getPhone():string{
    return $this->phone;
    }
}




?>