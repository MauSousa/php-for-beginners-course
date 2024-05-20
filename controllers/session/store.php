<?php

// login the user if the credentials match

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$errors = [];
// validate form inputs
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid email or password';
}

if (!empty($errors)) {
    return view('session/create.view.php', [
        'errors' => $errors,
    ]);
}

// match user credentials
$user = $db->query('select email, password from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // check if the hashes are equal
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email,
        ]);

        header('location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No account found for the email or password provided'
    ]
]);
