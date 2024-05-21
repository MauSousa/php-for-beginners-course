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
