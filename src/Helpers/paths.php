<?php

if (!function_exists('authAssets')){
    function authAssets($asset){
        return APP_URL.'/assets/authAssets/'.$asset;
    }
}

if (!function_exists('websiteAssets')){
    function websiteAssets($asset){
        return APP_URL.'/assets/websiteAssets/'.$asset;
    }
}
if (!function_exists('dashboardAssets')){
    function dashboardAssets($asset){
        return APP_URL.'/assets/dashboardAssets/'.$asset;
    }
}