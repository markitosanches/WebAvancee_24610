<?php 
class HomeController {

    public function index(){
        include('views/home.php');
    }

    public function home(){
        echo "Salut home";
    }
}
?>