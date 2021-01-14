<?php
// load file of constants of paths
require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'main.php';

// load the autolader file of composer
require_once ROOT_PATH.DS.'vendor'.DS.'autoload.php';

use App\Core\Application;

// some configuration used in runtime
$configuration=[
    'ROOT_PATH'        => ROOT_PATH,
    'VIEW_PATH'        => VIEW_PATH,
    'DASHBOARD_PREFIX' => DASHBOARD_PREFIX,
    'DASHBOARD_LAYOUT' => DASHBOARD_LAYOUT,
    'DEFAULT_PREFIX'   => DEFAULT_PREFIX,
    'DEFAULT_LAYOUT'   => DEFAULT_LAYOUT,
    'ERRORS_DIRECTORY' => ERRORS_DIRECTORY,
    'database'         =>[
        'database_hostname'   =>DB_HOST,
        'database_port'       =>DB_PORT,
        'database_user'       =>DB_USER,
        'database_password'   =>DB_PASS,
        'database_name'       =>DB_NAME
    ]
];
$app = new Application($configuration);

// load the frontend (website) routes
require_once ROUTES_PATH.DS.'website.php';

// load the backend (dashboard) routes
require_once ROUTES_PATH.DS.'dashboard.php';


$app->start();