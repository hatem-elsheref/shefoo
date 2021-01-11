<?php


namespace App\Core;


class Request
{

    private string $method;
    private string $path;

    public function __construct(){
        $this->resolveUrl();
    }

    private function resolveUrl(){
        $this->method=strtolower($_SERVER['REQUEST_METHOD']);
        $url=trim($_SERVER['REQUEST_URI'],'/');
        $location=strpos($url,'?');
        $url=($location === false)?$url:substr($url,0,$location);
        $this->path=(empty($url))?'/':$url;
    }

    public function getMethod(){
        return $this->method;
    }
    public function getPath(){
        return $this->path;
    }
    public function getFirstSegment(){
        $parts = explode('/',$this->getPath());
        return $parts[0];
    }
}