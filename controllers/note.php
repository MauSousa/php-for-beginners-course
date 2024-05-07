<?php

$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config);

$title = 'Note';

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->fetch();
// dd($note);

require("views/note.view.php");
