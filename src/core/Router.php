<?php

namespace Src\Core;

class Router
{
    private $routes = [];

    private function route(string $uri, string $controller, string $method)
    {
        $this->routes[] = [

            'uri' => $uri,
            'controller' => $controller,
            'method' => $method

        ];
    }

    public function get(string $uri, string $controller)
    {
        return $this->route($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller)
    {
        return $this->route($uri, $controller, 'POST');
    }

    public function resolve()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $uriMatched = false;

        foreach ($this->routes as $route) {
            if (preg_match($route['uri'], $path, $matches)) {
                if ($route['method'] !== $_SERVER['REQUEST_METHOD']) {
                    $uriMatched = true;
                    continue;
                }

                $params = array_slice($matches, 1);

                [$controller, $function] = explode('@', $route['controller']);

                $controller = "Src\\Controllers\\$controller";
                $controller = new $controller();
                $controller->$function(...$params);

                return;
            }
        }

        http_response_code($uriMatched ? 405 : 404);
    }
    
}
