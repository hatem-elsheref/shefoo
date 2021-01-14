<?php
namespace App\Models\Auth;

use App\Models\Model;

class RegisterModel extends Model
{

    public string $name;
    public string $email;
    public string $password;
    public string $passwordConfirmation;

    public function __construct(){
        static::$tableName ='users';
        static::$PK ='id';

        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->passwordConfirmation = '';
    }


    public function schema(){
        return [
            'name'      =>\PDO::PARAM_STR,
            'email'     =>\PDO::PARAM_STR,
            'password'  =>\PDO::PARAM_STR
        ];
    }
    public function register(){
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        return  $this->create();
    }

    public function rules(): array
    {
        return [
            'name'      =>[self::REQUIRED],
            'email'     =>[self::REQUIRED,self::EMAIL,self::UNIQUE],
            'password'  =>[self::REQUIRED,[self::MIN,'min' => 8],[self::MAX,'max' => 15]],
            'passwordConfirmation'=>[self::REQUIRED,[self::MATCH,'match' => 'password']]
        ];
    }




}