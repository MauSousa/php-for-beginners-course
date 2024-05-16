<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if (!Validator::string($_POST['body'], MIN_CHAR_NOTE, MAX_CHAR_NOTE)) $errors['body'] = 'A body of no more than 1,000 characters is required';

if (!empty($errors)) {
    // validation issue
    return view('notes/create.view.php', [
        'title' => 'Create a note',
        'errors' => $errors
    ]);
}

$db->query('INSERT notes SET body = :body, user_id = :user_id', [
    'body' => $_POST['body'],
    'user_id' => 1
]);

header('location: /notes');
die();
