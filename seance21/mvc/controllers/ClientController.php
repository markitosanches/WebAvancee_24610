<?php
namespace App\Controllers;

use App\Models\Client;
use App\Models\City;
use App\Providers\View;
use App\Providers\Validator;
use App\Providers\Auth;

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

        Auth::session();
        Auth::privilege(1);
        $city = new City;
        $select = $city->select('city');

        return View::render('client/create', ['cities'=>$select ]);
    }

    public function store($data){
        Auth::session();
        
        // print_r($data);
        // Array ( [name] => peter [address] => Av Desjardins [zip_code] => H1V 2H6 [phone] => 78967896897 [email] => peter@gmail.com [city_id] => 1 )
        $validator = new Validator;
        $validator->field('name', $data['name'])->min(2)->max(45);
        $validator->field('address', $data['address'])->max(45);
        $validator->field('zip_code', $data['zip_code'], 'Zip Code')->max(10);
        $validator->field('phone', $data['phone'])->max(20);
        $validator->field('email', $data['email'])->email()->max(45);
        $validator->field('city_id', $data['city_id'], 'City')->required()->int();

        // echo "<pre>";
        // var_dump($validator);
        // echo "</pre>";
        if($validator->isSuccess()){
            // echo 'success';
            // die();
            $client = new Client;
            $insert = $client->insert($data);
            return View::redirect('client/show?id='.$insert);
        }else{
            $errors = $validator->getErrors();
            $city = new City;
            $select = $city->select('city');

            return View::render('client/create', ['errors'=>$errors, 'cities'=>$select, 'client'=>$data]);
        }
    }

    public function edit($data = []){
        Auth::session();
        if(isset($data['id']) && $data['id']!=null){
            $client = new Client;
            $selectId = $client->selectId($data['id']);
            if($selectId){
                $city = new City;
                $select = $city->select('city');

                // echo $selectCity['city'];

                return View::render("client/edit", ['client' => $selectId, 'cities'=> $select]);
            }else{
                return View::render('error', ['msg'=>'Client not found!']);
            }
         
        }else{
             return View::render('error', ['msg'=>'404 page not found!']);
        }

    }

    public function update($data=[], $get = [])
    {
        Auth::session();
        // print_r($data);
        // echo "<hr/>";
        // print_r($get);
        // die();
        if(isset($get['id']) && $get['id']!=null){
            $validator = new Validator;
            $validator->field('name', $data['name'])->min(2)->max(45);
            $validator->field('address', $data['address'])->max(45);
            $validator->field('zip_code', $data['zip_code'], 'Zip Code')->max(10);
            $validator->field('phone', $data['phone'])->max(20);
            $validator->field('email', $data['email'])->email()->max(45);
            $validator->field('city_id', $data['city_id'], 'City')->required()->int();

            if($validator->isSuccess()){
                //update
                
                $client = new Client;
                $update = $client->update($data, $get['id']);
                // print_r($update);
                // die();
                if($update){
                    return View::redirect('clients');
                }else{
                    return View::render('error', ['msg'=>'Could not update!']);
                }
                
            }else{
                $errors = $validator->getErrors();
                $city = new City;
                $select = $city->select('city');

                return View::render('client/edit', ['errors'=>$errors, 'cities'=>$select, 'client'=>$data]);
            }

        }else{
             return View::render('error', ['msg'=>'404 page not found!']);
        }
    }

    public function delete($data){
       if(Auth::session()){
        // print_r($data);
            $client = new Client;
            $delete = $client->delete($data['id']);
            if($delete){
                return View::redirect('clients');
            }else{
                return View::render('error', ['msg'=>'Could not delete!']);
            }
       }
    }
}

?>