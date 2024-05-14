<?php

$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config['database']);

$title = 'My Notes';

$notes = $db->query("select * from notes where user_id = 1")->findAll();

require "views/notes/index.view.php";
