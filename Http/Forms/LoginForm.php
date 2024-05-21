<?php

declare(strict_types=1);

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    private $errors = [];

    public function validate(string $email, string $password)
    {
        // validate form inputs
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if (!Validator::string($password)) {
            $this->errors['password'] = 'Please provide a valid password';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}
