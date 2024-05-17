<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
// validate form inputs
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address';
}

if (!Validator::string($password, 8, 20)) {
    $errors['password'] = 'Password has to be between 8 and 20 characters long';
}

if (!empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors,
        'email' => $email
    ]);
}

// check if the account already exists
$db = App::resolve(Database::class);
$user = $db->query('select email, password from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // if yes, redirect to a login page
    header('location: /');
    exit();
    // then someone with that email exists and has an account
} else {
    // if not, save on to the database, then log the user in and redirect
    $db->query('insert users set email = :email, password = :password', [
        'email' => $email,
        'password' => $password
    ]);

    // mark that the user has logged in
    $_SESSION['user'] = [
        'email' => $email
    ];

    header('location: /');
    exit();
}
