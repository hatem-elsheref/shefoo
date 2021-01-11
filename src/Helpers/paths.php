<?php

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