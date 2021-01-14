<?php


namespace App\Core\General;


use App\Core\Application;

class DB
{
    public static function connection(){
        return Application::$app->connection->connectionHandler;
    }
}