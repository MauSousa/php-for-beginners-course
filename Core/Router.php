<?php

declare(strict_types=1);

namespace Core;

class Router
{
    private $routes = [];

    private function add($method, $uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get(string $uri, $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function patch(string $uri, $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    public function delete(string $uri, $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function route(string $uri, string $method)
    {
        if ($uri !== '/') {
            $uri = rtrim($uri, "/");
        }
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        self::abort();
    }

    public static function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}
