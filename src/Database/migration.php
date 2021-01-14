<?php

namespace App\Database;

$dir=dirname(__DIR__,2);
// load file of constants of paths
require_once $dir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'main.php';
// load the autolader file of composer
require_once ROOT_PATH . DS . 'vendor' . DS . 'autoload.php';

use App\Core\Application;
use App\Core\Blueprint;
use App\Core\Database;
use App\Database\Migrations\M_2021014115830_createMigrationsTable;

class migration{

    private $database;
    const MAIN_TABLE='migrations';
    const MIGRATION_CLASS='M_2021014115830_createMigrationsTable.php';
    private Blueprint $table;
    public function __construct($configurations){
        $this->database = (new Database($configurations))->connectionHandler;
        $this->table = new Blueprint($this->database);
        $this->migrateMainTable();
    }
    private function add($name){
        $SQL = "INSERT INTO ".self::MAIN_TABLE ."(name) VALUES (:name)";
        $statement = $this->database->prepare($SQL);
        $statement->bindValue(':name',$name,\PDO::PARAM_STR);
        $statement->execute();
    }

    private function getInstalledTables(){
        $SQL = "SELECT * FROM ".self::MAIN_TABLE ." WHERE name != :table_name";
        $statement = $this->database->prepare($SQL);
        $statement->bindValue(":table_name",self::MAIN_TABLE,\PDO::PARAM_STR);
        $statement->execute();
        return array_column($statement->fetchAll(\PDO::FETCH_ASSOC),'name');
    }
    // install new migrations
    public function migrate(){
        $migrationsFiles = scandir(MIGRATION_PATH);
        $migrationsFiles = array_diff($migrationsFiles,$this->getInstalledTables());
        foreach ($migrationsFiles as $file){
            if (!($file == '.' || $file == '..')){
                $className = pathinfo($file,PATHINFO_FILENAME);
                echo "[".date('Y-m-d H i s',time())."] Start Processing $className Migration ".PHP_EOL;
                $classNameWithNameSpace = '\App\Database\Migrations\\'.$className;
                $classObject = new $classNameWithNameSpace();
                $classObject->up($this->table);
                $this->add($file);
                echo "[".date('Y-m-d H i s',time())."] Finished Processing $className Migration ".PHP_EOL;
            }
        }
        if (empty($migrationsFiles) || count($migrationsFiles) ==2){
            echo " No New Migrations Founded To Run .. ".PHP_EOL;
        }else{
            echo "[".date('Y-m-d H i s',time())."] Migrations Ended Successfully .. ".PHP_EOL;

        }
    }

    // drop and install tables without migration table
    public function fresh(){
        $this->reset();
        $this->migrateMainTable();
        $this->migrate();
        echo "[".date('Y-m-d H i s',time())."] All Migrations Regenerated Successfully .. ".PHP_EOL;
    }

    // drop tables
    public function reset(){
        $migrationsFiles = scandir(MIGRATION_PATH);
        foreach ($migrationsFiles as $file){
            if (!($file == '.' || $file == '..')){
                $className = pathinfo($file,PATHINFO_FILENAME);
                echo "[".date('Y-m-d H i s',time())."] Start Removing $className Migration From Database ".PHP_EOL;
                $classNameWithNameSpace = '\App\Database\Migrations\\'.$className;
                $classObject = new $classNameWithNameSpace();
                $classObject->down($this->table);
                echo "[".date('Y-m-d H i s',time())."] Finished Removing $className Migration From Database".PHP_EOL;
            }
        }
        echo "[".date('Y-m-d H i s',time())."] All Migrations Has Been Reset Successfully .. ".PHP_EOL;
    }
    private function migrateMainTable(){
        $mainMigration = new M_2021014115830_createMigrationsTable();
        $mainMigration->up($this->table,self::MAIN_TABLE);
        try {
            $this->add(self::MIGRATION_CLASS);
        }catch (\PDOException $exception){

        }
    }
}
// some configuration used in runtime
$configuration = [
    'database_hostname' => DB_HOST,
    'database_port' => DB_PORT,
    'database_user' => DB_USER,
    'database_password' => DB_PASS,
    'database_name' => DB_NAME
];

$migrationModule = new migration($configuration);
//$migrationModule->fresh();
