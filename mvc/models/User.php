<?php
namespace App\Models;
use App\Models\CRUD;

class User extends CRUD{
    protected $table = "user";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'username', 'password', 'email', 'privilege_id']; 

    public function hashPassword($password, $cost= 10){
         $options = [ 
            'cost' => $cost
        ];

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    public function checkUser($username, $password){
        $user= $this->unique('username', $username);
        if($user){
            //echo $user['password']." ".$data['password']; 
            if(password_verify($password, $user['password'])){
                session_regenerate_id();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['privilege_id'] = $user['privilege_id'];
                $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);
                return true;
            }else{
                echo false;
            }
        }else{
            echo false;
        }
    }
}

?>