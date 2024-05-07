<?php

declare(strict_types=1);

require __DIR__ . '/config/constants.php';
require DIR_BASE . '/classes/Database.class.php';
require "functions.php";
// require "router.php";

$db = new Database();
$posts = $db->query("select * from posts")->fetchAll();

dd($posts);

// foreach ($posts as $post) {
//     echo "<li>" . $post['title'] . "</li>";
// }
