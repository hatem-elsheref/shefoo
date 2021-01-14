<?php

require_once 'src'.DIRECTORY_SEPARATOR.'main.php';

echo "Enter The Migration File Name .. ".PHP_EOL;
echo "=>  ";
$handle = fopen("php://stdin", "r");
$name = trim(fgets($handle));
if (strlen($name) > 3) {
    $content = file_get_contents(DATABASE_PATH.DS.'migration_stub.stub');
    $fileTime=date('YmdHis',time());
    $className = lcfirst(str_replace(' ','',ucwords(strtolower(str_replace('_',' ',$name)))));
    $fileName = 'M_'.$fileTime.'_'.$className;
    $content = str_replace('_temp_',$fileName,$content);
    file_put_contents(MIGRATION_PATH.DS.$fileName.'.php',$content);
}else{
    echo "the filename must be at least  3 characters".PHP_EOL;
}
