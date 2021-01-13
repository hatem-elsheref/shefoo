<?php

namespace App\Core;

use App\Core\General\Route;
use App\Http\Controllers\Auth\ForgetPassword;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
class Auth
{
    public static function routes($options=['login'=>true,'register'=>true,'forget'=>true]){
        if ($options['login'] === true){
            Route::get('/login',[LoginController::class,'showLoginForm']);
            Route::post('/login',[LoginController::class,'login']);
            Route::post('/logout',[loginController::class,'logout']);
        }
        if ($options['register'] === true){
            Route::get('/register',[RegisterController::class,'showRegisterForm']);
            Route::post('/register',[RegisterController::class,'register']);
        }
        if ($options['forget'] === true){
            Route::get('/forget-password',[ForgetPassword::class,'showForgetForm']);
            Route::post('/forget-password',[ForgetPassword::class,'sendResetUrl']);
            Route::get('/reset-password',[ForgetPassword::class,'showResetForm']);
            Route::post('/reset-password',[ForgetPassword::class,'reset']);
        }



    }
}