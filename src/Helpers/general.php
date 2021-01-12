<?php

if (!function_exists('view')){
    function view($view,$params=[]){
        return \App\Core\General\View::view($view,$params);
    }
}