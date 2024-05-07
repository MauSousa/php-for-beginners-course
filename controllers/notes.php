<?php

$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config);

$title = 'My Notes';

$notes = $db->query("select * from notes where user_id = 1")->fetchAll();

require "views/notes.view.php";
