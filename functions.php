<?php

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

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $data = [])
{
    extract($data);
    require base_path('views/' . $path);
}
