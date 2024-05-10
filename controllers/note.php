<?php

$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config);

$title = 'Note';

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

$currentUserId = 1;
authorize($note['user_id'] === $currentUserId);

require("views/note.view.php");
