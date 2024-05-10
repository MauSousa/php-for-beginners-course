<?php

$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config);

$title = 'Note';

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->fetch();

if (!$note) abort();

$currentUserId = 1;
if ($note['user_id'] !== $currentUserId) abort(Response::FORBIDDEN);

require("views/note.view.php");
