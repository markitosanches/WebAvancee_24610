<?php
namespace App\Controllers;

use App\Models\Client;

class ClientController{

    public function index(){
        $client = new Client;
        $select = $client->select();
        echo "<pre>";
        var_dump($select);
        echo "</pre>";
    }
}

?>