<?php

declare(strict_types=1);

namespace Core;

class App
{

    protected static $container;

    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve(string $key)
    {
        return static::container()->resolve($key);
    }
}
