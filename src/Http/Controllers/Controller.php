<?php


namespace App\Http\Controllers;


use App\Core\Application;

abstract class Controller
{
    public function layout($layout){
        Application::$app->layout=$layout;
    }

}