<?php

use App\Http\Controllers\UserController;


$app->router->get('/',function (){
    return 'Hello landing Page';
});

$app->router->get('/home',function (){
    return 'Hello Home Page';
});

$app->router->get('/about',function (){
    return 'Hello About Page';
});
$app->router->get('/contact','website.contactView');

$app->router->get('/users',[UserController::class,'index']);
