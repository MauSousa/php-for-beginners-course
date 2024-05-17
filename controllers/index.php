<?php
$_SESSION['name'] = 'Yo';

view("index.view.php", [
    'title' => 'Home',
]);
