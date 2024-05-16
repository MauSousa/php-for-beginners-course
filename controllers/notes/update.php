<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);
$currentUserId = 1;

// Find the note
$note = $db->query("select id, body, user_id from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

// Check if user can edit the note
authorize($note['user_id'] === $currentUserId);

// Validate the form
$errors = [];
if (!Validator::string($_POST['body'], MIN_CHAR_NOTE, MAX_CHAR_NOTE)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}
// If no validation errors -> update
if (count($errors)) {
    return view('notes/edit.view.php', [
        'title' => 'Edit note',
        'errors' => $errors,
        'note' => $note
    ]);
}

// update
$db->query("update notes set body = :body where id = :id", [
    'id' => $_POST['id'],
    'body' => $_POST['body'],
]);

// redirect the user
header('location: /notes');
die();
