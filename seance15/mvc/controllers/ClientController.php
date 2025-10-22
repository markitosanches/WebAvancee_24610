<?php
namespace App\Controllers;

use App\Models\Client;
use App\Models\City;
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

    public function show($data = []){
        if(isset($data['id']) && $data['id']!=null){
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if($selectId){
                
                $city_id =  $selectId['city_id'];

                $city = new City;
                $selectCity = $city->selectId($city_id);
                if($selectCity){
                    $city = $selectCity['city'];
                }else{
                    $city = null;
                }
                // echo $selectCity['city'];

                return View::render("client/show", ['client' => $selectId, 'city'=> $city]);
            }else{
                return View::render('error', ['msg'=>'Client not found!']);
            }
         
        }else{
             return View::render('error', ['msg'=>'404 page not found!']);
        }
    }

    public function create(){
        $city = new City;
        $select = $city->select('city');

        return View::render('client/create', ['cities'=>$select ]);
    }

    public function store($data){
        $client = new Client;
        $insert = $client->insert($data);
        // print_r($insert);
        // die();
        // header('location:'.BASE.'/client/show?id'.$insert);
        return View::redirect('client/show?id='.$insert);

    }
}

?>