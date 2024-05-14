<?php

const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . "core/functions.php";

spl_autoload_register(function ($class) {
    require base_path("core/classes/{$class}.php");
});

require base_path('constants.php');
require base_path('core/router.php');
