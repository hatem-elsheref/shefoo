<?php
namespace App\Core;

class Application{

    public string $layout;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $connection;
    public array $config;
    public array $old=[];
    public array $errors=[];
    public static $app;

    public function __construct($config){
        $this->config=$config;
        $this->request = new Request();
        $this->response = new Response();
        $this->connection = new Database($this->config['database']);
        $this->router = new Router($this->request,$this->response);
        $this->selectLayout();
        self::$app=$this;
    }

    public function start(){
        echo $this->router->resolve();
    }

    private function selectLayout(){
        $segment = $this->request->getFirstSegment();
        if ($segment === $this->config['DASHBOARD_PREFIX'])
            $this->layout = $this->config['DASHBOARD_LAYOUT'];
        else
            $this->layout = $this->config['DEFAULT_LAYOUT'];
    }

    public function terminate($message){
        echo '<pre>'; var_dump($message); exit;
    }
}