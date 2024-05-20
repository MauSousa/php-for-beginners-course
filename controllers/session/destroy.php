<?php

// log the user out
$_SESSION = [];
session_destroy();

$params = session_get_cookie_params();
setcookie('notes-app', '', time() - 3600, $params['path'], $params['domain']);


header('location: /');
