<?php
namespace App\Controllers;

use App\Models\Client;
use App\Providers\View;

class ClientController{

    public function index(){
        $client = new Client;
        $select = $client->select();
        // echo "<pre>";
        // var_dump($select);
        // echo "</pre>";
        // include('views/client/index.php');
        return View::render("client/index", ['clients' => $select]);
    }

    public function show(){
        return View::render("client/show");
    }
}

?>