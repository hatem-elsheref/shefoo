<?php

if (!function_exists('redirect')){
    function redirect($path){
        return \App\Core\Application::$app->response->redirect($path);
    }
}
if (!function_exists('session')){
    function session(){
        return \App\Core\Application::$app->session;
    }
}



if (!function_exists('view')){
    function view($view,$params=[]){
        return \App\Core\General\View::view($view,$params);
    }
}

if (!function_exists('old')){
    function old($key,$default=''){
        return \App\Core\Application::$app->old[$key]??$default;
    }
}
if (!function_exists('error')){
    function error($key){
        return \App\Core\Application::$app->errors[$key][0]??null;
    }
}
if (!function_exists('errors')){
    function errors(){
        return \App\Core\Application::$app->errors;
    }
}