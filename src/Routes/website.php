<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Core\General\Route;

Route::get('/login',[LoginController::class,'showLoginForm']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/register',[RegisterController::class,'showRegisterForm']);
Route::post('/register',[RegisterController::class,'register']);



Route::get('/',function (){
    return 'Hello landing Page';
});

Route::get('/home',function (){
    return 'Hello Home Page';
});

Route::get('/about',function (){
    return 'Hello About Page';
});
Route::get('/contact','website.contactView');

Route::get('/users',[UserController::class,'index']);
