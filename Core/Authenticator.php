<?php

declare(strict_types=1);

use Core\App;
use Core\Database;

class Authenticator
{
    public function attempt(string $email, string $password)
    {
        $user = App::resolve(Database::class)->query('select email, password from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                ]);

                return true;
            }
        }

        return false;
    }

    public function login(array $user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('notes-app', '', time() - 3600, $params['path'], $params['domain']);
    }
}
