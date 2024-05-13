<?php

$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config['database']);

$title = 'Create a note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->query('INSERT notes SET body = :body, user_id = :user_id', [
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
}

require('views/note-create.view.php');
