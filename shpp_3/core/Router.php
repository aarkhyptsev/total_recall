<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function addRoute($route, $controller, $action)
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($uri)
    {
        /*if ($uri == '/') {
            $uri = '/?offset=10';
        }*/
        $fit = false;
        foreach ($this->routes as $route => $routeData) {
            if (preg_match($route, $uri, $matches)) {
                $controller = $this->routes[$route]['controller'];
                $action = $this->routes[$route]['action'];
                $param = isset($matches[1]) ? $matches[1] : 0;
                $fit = true;

                $controller = new $controller();
                $controller->$action($param);
            }
        }

        if (!$fit) {
            throw new \Exception("No route found for URI: $uri");
        }

    }

}