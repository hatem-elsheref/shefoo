<?php
namespace App\Core\General;

use App\Core\Application;

class Route{

    public static function get($path,$callback){
        Application::$app->router->get($path,$callback);
    }
    public static function post($path,$callback){
        Application::$app->router->post($path,$callback);
    }

}