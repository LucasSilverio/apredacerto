<?php

require __DIR__ ."/vendor/autoload.php";

use Lucas\src\Router;

$router = new Router();

require __DIR__ . "/config/routes.php";

try{
    $data = $router->run();
    
    extract($data['data']);

    if(!isset($data['view'])) {
        throw new Exception("View não informada");
    }

    if(!file_exists(__DIR__."/app/views/".$data['view'])) {
        throw new Exception("View não existe");
    }

    $view = $data['view'];

    require __DIR__."/app/views/template.php";

}catch(Exception $e) {
    echo $e->getMessage();
}

