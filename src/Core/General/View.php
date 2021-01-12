<?php
namespace App\Core\General;

use App\Core\Application;

class View{
    public static function view($view,$params=[]){
        return Application::$app->router->view($view,$params);
    }
}