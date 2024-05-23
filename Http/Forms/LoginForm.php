<?php

declare(strict_types=1);

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    private $errors = [];

    public function __construct(public array $attributes)
    {
        // validate form inputs
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($attributes['password'])) {
            $this->errors['password'] = 'Please provide a valid password';
        }
    }

    public static function validate(array $attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error(string $field, string $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
