<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Models\User;


class AuthController {

    public function create(){
            return View::render('auth/create');
    }

    public function store($data){
        $validator = new Validator;
        $validator->field('username', $data['username'])->required()->max(50)->email();
        $validator->field('password', $data['password'])->min(6)->max(20);

         if($validator->isSuccess()){
            
            $user = new User;
            $checkuser = $user->checkUser($data['username'], $data['password']);
            if($checkuser){
               return View::redirect('clients');
            }else{
                $errors['message'] = "Please check yoru credentials";
                return view::render('auth/create', ['errors'=>$errors, 'user' =>$data]); 
            }

         }else{
            $errors = $validator->getErrors();
            return view::render('auth/create', ['errors'=>$errors, 'user' =>$data]);
         }

    }
    public function delete(){
        session_destroy();
        return View::redirect('login');
    }
}