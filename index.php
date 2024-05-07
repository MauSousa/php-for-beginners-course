<?php

declare(strict_types=1);

require __DIR__ . '/config/constants.php';
require DIR_BASE . '/classes/Database.class.php';
require "functions.php";
// require "router.php";

$config = require(DIR_BASE . '/config/config.php');
$db = new Database($config);

$id = $_GET['id'];
$query = "select * from posts where id = {$id}";

$posts = $db->query($query)->fetch();

dd($posts);

// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
