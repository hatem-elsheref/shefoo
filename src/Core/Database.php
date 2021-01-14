<?php


namespace App\Core;


class Database
{
    public \PDO $connectionHandler;

    public function __construct($configuration){
        $hostname = $configuration['database_hostname'];
        $port     = $configuration['database_port'];
        $database = $configuration['database_name'];
        $user     = $configuration['database_user'];
        $password = $configuration['database_password'];

        $dsn = "mysql:host=$hostname;dbname=$database;port=$port";

        $this->connectionHandler = new \PDO($dsn,$user,$password);
        $this->connectionHandler->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        $this->connectionHandler->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
        $this->connectionHandler->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND,"SET NAMES UTF8");
    }



}