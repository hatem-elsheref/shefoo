<?php


namespace App\Models\Auth;


use App\Models\Model;

class LoginModel extends Model
{

    public string $email;
    public string $password;

    public function __construct(){
        $this->email = '';
        $this->password = '';
    }

    public function login(){
        return true;
    }

    public function rules(): array
    {
       return [
           'email'    =>[self::REQUIRED,self::EMAIL],
           'password' =>[self::REQUIRED]
       ];
    }
}