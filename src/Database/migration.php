<?php

$dir=dirname(__DIR__,2);

// load file of constants of paths
require_once $dir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'main.php';

// load the autolader file of composer
require_once ROOT_PATH . DS . 'vendor' . DS . 'autoload.php';

use App\Core\Application;

// some configuration used in runtime
$configuration = [
    'database_hostname' => DB_HOST,
    'database_port' => DB_PORT,
    'database_user' => DB_USER,
    'database_password' => DB_PASS,
    'database_name' => DB_NAME
];
$database = new \App\Core\Database($configuration);


$b=new \App\Core\Blueprint($database->connectionHandler);
$user=new \App\Database\Migrations\M_20210114002744_createUserTable();
$user->down($b);
$user->up($b);