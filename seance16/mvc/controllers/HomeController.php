<?php 
namespace App\Controllers;

// include('models/ExampleModel.php');
use App\Models\ExampleModel;

class HomeController {

    public function index(){
        $model = new ExampleModel;
        $data = $model->getData();
        // echo $data;
        // die();
        include('views/home.php');
    }

    public function home(){
        echo "Salut home";
    }
}
?>