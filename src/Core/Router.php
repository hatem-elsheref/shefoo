<?php


namespace App\Core;

class Router
{
    public array $routes;
    private Request $request;
    private Response $response;
    public function __construct(Request $request,Response $response){
       $this->routes = ['get'=>[],'post'=>[]];
       $this->request = $request;
       $this->response = $response;
    }

    public function get($path,$callback){
        if ($path === '/')
            $this->routes['get'][$path] = $callback;
        else
            $this->routes['get'][trim($path,'/')] = $callback;
    }
    public function post($path,$callback){
        if ($path === '/')
            $this->routes['post'][$path] = $callback;
        else
            $this->routes['post'][trim($path,'/')] = $callback;
    }
    public function resolve(){
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false){
            return $this->showErrorPage(Application::$app->config['ERRORS_DIRECTORY'].'.404');
            /*
            $this->response->setStatusCode(404);
            Application::$app->terminate("Route [==> <h1>$path</h1> <==] Not Found !!");
            */
        }


        if (is_string($callback)){
            if (file_exists($this->prepareViewPath($callback)))
                return $this->view($callback);
            else{
                /*
                $this->response->setStatusCode(404);
                Application::$app->terminate("View [==> <h1>$callback</h1> <==] Not Found !!");
                */
                return $this->showErrorPage(Application::$app->config['ERRORS_DIRECTORY'].'.404');
            }
        }

        if (is_array($callback)){
            $callback[0] = new $callback[0]();
        }
            return call_user_func($callback,Application::$app->request);


    }

    public function view($view,$params=[]){
        $layout = Application::$app->layout;
        $layoutContent = $this->getLayoutContent($layout);
        $viewContent = $this->getViewContent($view,$params);
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }
    private function getViewContent($view,$params=[]){
        foreach ($params as $key => $value){
            $$key = $value;
        }
        ob_start();
        include_once $this->prepareViewPath($view);
        return ob_get_clean();
    }
    private function getLayoutContent($layout){
        ob_start();
        include_once $this->prepareLayoutPath($layout);
        return ob_get_clean();
    }
    private function prepareViewPath($view){
        $view = str_replace('.',DS,trim($view,'.'));
        return Application::$app->config['VIEW_PATH'].DS.$view.'.view.php';
    }
    private function prepareLayoutPath($layout){
        $layout = str_replace('.',DS,trim($layout,'.'));
        return Application::$app->config['VIEW_PATH'].DS.'layouts'.DS.$layout.'.layout.php';
    }
    private function prepareErrorPath($error){
        $error = str_replace('.',DS,trim($error,'.'));
        return Application::$app->config['VIEW_PATH'].DS.$error.'.php';
    }
    public function showErrorPage($errorPage){
        ob_start();
        include_once $this->prepareErrorPath($errorPage);
        return ob_get_clean();
    }


}