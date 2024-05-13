<?php

require DIR_BASE . '/classes/Validator.class.php';
$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config['database']);

$title = 'Create a note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    if (!Validator::string($_POST['body'], MIN_CHAR_NOTE, MAX_CHAR_NOTE)) $errors['body'] = 'A body of no more than 1,000 characters is required';

    if (empty($errors)) {
        $db->query('INSERT notes SET body = :body, user_id = :user_id', [
            'body' => $_POST['body'],
            'user_id' => 1
        ]);
    }
}

require('views/note-create.view.php');
