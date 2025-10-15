<?php
include 'routes/Route.php';
include 'controllers/HomeController.php';

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
