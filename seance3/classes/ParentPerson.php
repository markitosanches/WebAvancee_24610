<?php

class ParentPerson{
    public string $name;
    public string $address;
    protected string $phone;
    public string $country;
    private string $language;

    final public function __construct($name){
        $this->name = $name;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    }

    public function setLanguage(){
        if($this->country == "USA"){
            $this->language = "English";
        } elseif ($this->country == "France"){
             $this->language = "French";
        }else{
            $this->language = "N/A";
        }
    }

}

?>