<?php
namespace App\Providers;
use App\Providers\Views;

class Auth {
    static public function session(){
         if(isset($_SESSION['fingerPrint']) && $_SESSION['fingerPrint'] == md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){
            return true;
        }else{
            return view::redirect('login');
         }
    }

    static public function privilege($id){
        if($_SESSION['privilege_id'] == $id){
            return TRUE;
        }else{
            return view::redirect('login');
        }
    }
}

