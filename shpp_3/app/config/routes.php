<?php

use Core\Router;
use App\Controllers\BookController;

$router = new Router();

$router->addRoute('#^\/\?offset=(\d+)$#', BookController::class, 'showOffset');
$router->addRoute('#^\/book\/(\d+)$#', BookController::class, 'showById');


// Возвращаем объект Router
return $router;