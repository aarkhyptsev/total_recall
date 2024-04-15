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
        $fit = false;
        foreach ($this->routes as $route => $routeData) {
            if (preg_match($route, $uri, $matches)) {
                $controller = $this->routes[$route]['controller'];
                $action = $this->routes[$route]['action'];
                $param = $matches[1];
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