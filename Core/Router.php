<?php

declare(strict_types=1);

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    private $routes = [];

    private function add(string $method, string $uri, string $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get(string $uri, string $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function patch(string $uri, string $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function delete(string $uri, string $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function only(string $key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route(string $uri, string $method)
    {
        if ($uri !== '/') {
            $uri = rtrim($uri, "/");
        }
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // apply the middleware
                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        self::abort();
    }

    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    public static function abort(int $code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}
