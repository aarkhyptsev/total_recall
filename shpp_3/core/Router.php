<?php

namespace Core;

/**
 * Class Router
 *
 * The Router class manages the routing of incoming requests
 * to appropriate controller methods based on URI patterns.
 */
class Router
{
    protected $routes = [];

    /**
     * Add a route to the routing table.
     *
     * @param string $route The route pattern to match.
     * @param string $controller The controller class name.
     * @param string $action The controller method to call.
     * @return void
     */
    public function addRoute($route, $controller, $action)
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    /**
     * Dispatches the request to the appropriate controller method.
     *
     * If the URI matches any of the route patterns, it calls the
     * corresponding controller method with the provided parameter.
     * If no matching route is found, it sends a 404 (Not Found) status code
     * along with a JSON response containing an error message.
     *
     * @param string $uri The URI to match against routes.
     * @return void
     */
    public function dispatch($uri)
    {
        // Search for matching uri to a routes pattern
        foreach ($this->routes as $route => $routeData) {
            if (preg_match($route, $uri, $matches)) {
                $controller = $this->routes[$route]['controller'];
                $action = $this->routes[$route]['action'];
                $param = isset($matches[1]) ? $matches[1] : 0;
                // Call the method of the controller with parameter
                $controller = new $controller();
                $controller->$action($param);
                exit();
            }
        }
        // Send status code 404 (Not Found) and JSON with errors message
        ResponseHandler::sendError('No route found for URI: ' . $uri, 404);
    }
}
