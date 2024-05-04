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
