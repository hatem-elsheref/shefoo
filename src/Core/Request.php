<?php


namespace App\Core;


class Request
{

    private string $method;
    private string $path;
    private array $body;

    public function __construct(){
        $this->body = [];
        $this->resolveUrl();
    }

    private function resolveUrl(){
        $this->method=strtolower($_SERVER['REQUEST_METHOD']);
        $url=trim($_SERVER['REQUEST_URI'],'/');
        $location=strpos($url,'?');
        $url=($location === false)?$url:substr($url,0,$location);
        $this->path=(empty($url))?'/':$url;
    }

    public function method(){
        return $this->method;
    }
    public function getPath(){
        return $this->path;
    }
    public function getFirstSegment(){
        $parts = explode('/',$this->getPath());
        return $parts[0];
    }
    public function isGet(){
        return $this->method === 'get';
    }
    public function isPost(){
        return $this->method === 'post';
    }

    private function prepareRequestBody(){
        $body=[];
        if ($this->isGet())
            foreach ($_GET as $key => $value)
                $body[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        else
            foreach ($_POST as $key => $value)
                 $body[$key] = filter_input(INPUT_POST,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->body = $body;
    }
    public function body(){
        $this->prepareRequestBody();
        return $this->body;
    }
    public function getUrlParams(){
        $body=[];
            foreach ($_GET as $key => $value)
                $body[$key] = filter_input(INPUT_GET,$key,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            return $body;

    }
}