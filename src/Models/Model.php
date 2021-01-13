<?php


namespace App\Models;

use App\Core\Application;
use App\Core\Validator;

abstract class Model{

    use Validator;

    public const REQUIRED = 'required';
    public const EMAIL    = 'email';
    public const MIN      = 'min';
    public const MAX      = 'max';
    public const MATCH    = 'match';
    public const UNIQUE   = 'unique';

    public function loadData($data){
        foreach($data as $key => $value){
            $this->{$key} = $value ?? '';
        }
        Application::$app->old = $data;
    }
}