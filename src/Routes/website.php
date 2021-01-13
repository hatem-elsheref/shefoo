<?php

use App\Http\Controllers\UserController;
use App\Core\General\Route;
use App\Core\Auth;


Auth::routes(['login'=>true,'register'=>true,'forget'=>true]);



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
