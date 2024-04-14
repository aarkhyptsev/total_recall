<?php

use app\Router;
use app\Controllers\UserController;

$router = new Router();

$router->addRoute('/', UserController::class, 'index');
// Возвращаем объект Router
return $router;