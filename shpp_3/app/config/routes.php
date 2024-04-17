<?php

use Core\Router;
use App\Controllers\BookController;
use App\Controllers\AdminPageController;

$router = new Router();

$router->addRoute('#^\/$#', BookController::class, 'showOffset');
$router->addRoute('#^\/\?offset=(\d+)$#', BookController::class, 'showOffset');
$router->addRoute('#^\/book\/(\d+)$#', BookController::class, 'showById');
$router->addRoute('#^\/admin$#', AdminPageController::class, 'showPage');
$router->addRoute('#^\/admin\/(\d+)$#', AdminPageController::class, 'showPage');
$router->addRoute('#^\/admin\/add$#', AdminPageController::class, 'addBook');


// Возвращаем объект Router
return $router;