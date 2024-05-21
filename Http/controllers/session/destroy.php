<?php

use Core\Authenticator;

$logout = new Authenticator();
$logout->logout();

redirect('/');
