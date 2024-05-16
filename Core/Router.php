<?php

declare(strict_types=1);

namespace Core;

class Router
{
    private $routes = [];

    private function add(string $method, string $uri, string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get(string $uri, string $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function patch(string $uri, string $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    public function delete(string $uri, string $controller)
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
                // dede($uri);
                // dede($route['method']);
                // dd($route['controller']);
                return require base_path($route['controller']);
            }
        }

        self::abort();
    }

    public static function abort(int $code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}
