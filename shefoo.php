<?php

require_once 'src'.DIRECTORY_SEPARATOR.'main.php';

start();

function start(){

    echo PHP_EOL.'Enter The Number Of Process .....'.PHP_EOL;
    echo PHP_EOL.'[1] Make New Migration File .....'.PHP_EOL;
    echo PHP_EOL.'[2] Run Migrations .....'.PHP_EOL;
    echo PHP_EOL.'[3] Reset Migrations .....'.PHP_EOL;
    echo PHP_EOL.'[4] Refresh Migrations .....'.PHP_EOL;
    echo "=>  ";
    $handle = fopen("php://stdin", "r");
    $process = trim(fgets($handle));
    if ($process == 1){
        echo "Enter The Migration File Name .. ".PHP_EOL;
        echo "=>  ";
//    $handle = fopen("php://stdin", "r");
        $name = trim(fgets($handle));
        if (strlen($name) > 3) {
            $content = file_get_contents(DATABASE_PATH.DS.'migration_stub.stub');
            $fileTime=date('YmdHis',time());
            $className = lcfirst(str_replace(' ','',ucwords(strtolower(str_replace('_',' ',$name)))));
            $fileName = 'M_'.$fileTime.'_'.$className;
            $content = str_replace('_temp_',$fileName,$content);
            file_put_contents(MIGRATION_PATH.DS.$fileName.'.php',$content);
            echo "the migration file $fileName.php created successfully ".PHP_EOL;
        }else{
            echo "the filename must be at least  3 characters".PHP_EOL;
        }
    }elseif ($process == 2){
        require_once 'src/Database/migration.php';
        $migrationModule->migrate();
    }elseif ($process == 3){
        require_once 'src/Database/migration.php';
        $migrationModule->reset();
    }elseif ($process == 4){
        require_once 'src/Database/migration.php';
        $migrationModule->fresh();
    }else{
        echo "Please Enter A Valid Process ".PHP_EOL;
        start();
    }
}

