<?php

require_once 'ParentClass.php';

class EnfantClass extends ParentClass {
    public int $id;

    public function setName($name, $b = null){
        $this->name = $name;
    }
}

?>