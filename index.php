<?php

require "functions.php";
// require "router.php";

// MySQL connection
$dsn = "mysql:host=127.0.01;port=3310;dbname=myapp;charset=utf8mb4";
$options = [
    PDO::ATTR_EMULATE_PREPARES   => false, // Disable emulation mode for "real" prepared statements
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Disable errors in the form of exceptions
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Make the default fetch be an associative array
];
$pdo = new PDO($dsn, "laracasts", "root_root", $options);

$query = "select * from posts";
$statement = $pdo->prepare($query);

$statement->execute();

$posts = $statement->fetchAll();

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}
