<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);
$currentUserId = 1;

$note = $db->query("select id, body, user_id from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/edit.view.php', [
    'title' => 'Edit note',
    'errors' => [],
    'note' => $note
]);
