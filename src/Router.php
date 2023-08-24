<?php

namespace Lucas\src;

use Exception;

class Router
{
    protected $routes = [];

    public function add($method, $pattern , $callback)
    {
        $method = strtolower($method);
        $pattern = '/^'. str_replace('/', '\/', $pattern). '$/';
        $this->routes[$method][$pattern] = $callback;
    }

    public function getCurrentUrl():string
    {
        $pathInfo = $_SERVER['REQUEST_URI'];
        if (strlen($pathInfo) > 1) {
            $pathInfo = rtrim($pathInfo, '/');
        }
        return $pathInfo;
    }

    public function run()
    {
        $pathInfo = $this->getCurrentUrl();
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $exists = false;
        
        foreach($this->routes[$method] as $route => $action) {            
            if (preg_match($route, $pathInfo, $params)){
                $controller = new Controller();
                return $controller->manage($action($params), $params);
                $exists = true;
            }            
        }             

        if (!$exists) {
            throw new Exception("Pagina não encontrada");
        }

        
    }
}