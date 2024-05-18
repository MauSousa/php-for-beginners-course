<?php

declare(strict_types=1);

namespace Core\Middleware;

class Middleware
{
    protected const MAP = [
        'guest' => Guest::class,
        'auth' => Auth::class
    ];

    public static function resolve(string|null $key)
    {
        // if no middleware is applied
        if (!$key) return;

        // checks if key exists, else false
        $middleware = static::MAP[$key] ?? false;

        // if middleware is not on middlewares array
        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}' ");
        }

        (new $middleware)->handle();
    }
}
