<?php

$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config['database']);

$title = 'Create a note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    if (strlen($_POST['body']) === NULL_CHAR_NOTE) {
        $errors['body'] = 'A body is required';
    }

    if (strlen($_POST['body']) > MAX_CHAR_NOTE) {
        $errors['body'] = "The body of the note can not be more than 1,000 characters";
    }

    if (empty($errors)) {
        $db->query('INSERT notes SET body = :body, user_id = :user_id', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require('views/note-create.view.php');
