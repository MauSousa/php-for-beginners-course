<?php

class Validator
{
    public static function string($value, $min, $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }
}
