<?php

use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors(),
    ]);
};

$db = App::resolve(Database::class);

$auth = new Authenticator();

if ($auth->attempt($email, $password)) {
    header('location: /');
    exit();
} else {
    return view('session/create.view.php', [
        'errors' => [
            'email' => 'No account found for the email or password provided'
        ]
    ]);
}
