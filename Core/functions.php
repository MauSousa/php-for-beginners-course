<?php

use Core\Response;
use Core\Router;

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
        Router::abort($status);
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

function login(array $user)
{
    $_SESSION['user'] = [
        'email' => $user['email'],
    ];

    session_regenerate_id(true);
}

function logout()
{
    // log the user out
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('notes-app', '', time() - 3600, $params['path'], $params['domain']);
}
