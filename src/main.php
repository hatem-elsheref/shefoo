<?php

// database
define('DB_HOST','localhost');
define('DB_PORT','3306');
define('DB_USER','hatem');
define('DB_PASS','webserver');
define('DB_NAME','shefoo');


// paths
define('DS',DIRECTORY_SEPARATOR);
define('ROOT_PATH',dirname(__DIR__));
define('SRC_PATH',ROOT_PATH.DS.'src');
define('ROUTES_PATH',SRC_PATH.DS.'Routes');
define('CORE_PATH',SRC_PATH.DS.'Core');
define('VIEW_PATH',SRC_PATH.DS.'Views');
define('STORAGE_PATH',SRC_PATH.DS.'storage');
define('DATABASE_PATH',SRC_PATH.DS.'Database');
define('MIGRATION_PATH',DATABASE_PATH.DS.'Migrations');
define('MODELS_PATH',SRC_PATH.DS.'Models');
define('ERRORS_DIRECTORY','errors');

// url
define('APP_NAME','SHEFOO');
define('APP_AUTHOR','Hatem Mohamed');
define('APP_DESC','Shefoo Mvc App');
define('APP_URL','http://localhost:2020');

// general
define('DEFAULT_PREFIX','');
define('DEFAULT_LAYOUT','website');

define('DASHBOARD_PREFIX','admin');
define('DASHBOARD_LAYOUT','dashboard');

