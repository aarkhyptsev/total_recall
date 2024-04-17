<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config/connection.php';

spl_autoload_register(function($class) {
    preg_match('#(.+)\\\\(.+?)$#', $class, $match);
    $nameSpace = str_replace('\\', DIRECTORY_SEPARATOR, strtolower($match[1]));
    $className = $match[2];
    $path = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . $nameSpace . DIRECTORY_SEPARATOR . $className . '.php';
    require_once $path;
});
//Get uri
$uri = $_SERVER['REQUEST_URI'];
//Create new Router
$router = require 'app/config/routes.php';
//Start request process
$router->dispatch($uri);
