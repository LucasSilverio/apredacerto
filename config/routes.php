<?php

$router->add('get', '/', function(){
    return "Login@index";
});

$router->add('get', '/home', function(){
    return "Home@index";
});

$router->add('post', '/login', function(){
    return "Login@logar";
});
