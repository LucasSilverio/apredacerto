<?php

namespace Lucas\src;

use Exception;

class Controller
{
    public function manage($pathInfo, $params)
    {
        [$controller, $method] = explode("@", $pathInfo);
        
        $class = "App\\controllers\\".$controller;
        
        if (!class_exists($class))
            throw new Exception("Controller não existe");
        
        $controllerInstance = new $class;

        if (!method_exists($controllerInstance, $method))
            throw new Exception("Metodo não existe");

        return $controllerInstance->$method($params);
    }
}