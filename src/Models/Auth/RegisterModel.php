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

    public function register(){
        // create the new user in database ... soon ...
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      =>[self::REQUIRED],
            'email'     =>[self::REQUIRED,self::EMAIL],
            'password'  =>[self::REQUIRED,[self::MIN,'min' => 8],[self::MAX,'max' => 15]],
            'passwordConfirmation'=>[self::REQUIRED,[self::MATCH,'match' => 'password']]
        ];
    }




}