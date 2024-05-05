<?php

require __DIR__ . '/config/constants.php';

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function dd($text)
{
    echo '<pre>';
    var_export($text);
    echo '</pre>';

    die();
}

function dede($text)
{
    echo '<pre>';
    var_export($text);
    echo '</pre>';
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.view.php";
    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}
