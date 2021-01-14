<?php


namespace App\Core;


use App\Core\General\DB;

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

    public function create(){
        $attributes = array_keys($this->schema());
        $binding = array_map(fn($attr)=>":$attr",$attributes);
        $sql = "INSERT INTO ".static::$tableName." (".implode(',',$attributes).") VALUES (".implode(',',$binding).")";
        $statement = DB::connection()->prepare($sql);
        foreach ($this->schema() as $attributeName => $attributeType)
            $statement->bindParam(":$attributeName",$this->{$attributeName},$attributeType);

        return $statement->execute();
    }

    public function findFirstBy($column,$value){
        $sql = "SELECT * FROM ".static::$tableName." WHERE $column=:attr";
        $statement = DB::connection()->prepare($sql);
        $statement->bindValue(":attr",$value);
        $statement->execute();
        if ($statement->rowCount() == 0)
            return false;

        return $statement->fetch(\PDO::FETCH_OBJ);
    }


}