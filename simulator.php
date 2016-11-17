<?php

define('APPPATH', __DIR__);

if (file_exists(APPPATH.'/vendor/autoload.php')) {
    require_once(APPPATH.'/vendor/autoload.php');
}
else {
    echo "Vendor autoloader not found\n";
    exit(1);
}

$simulator = new App\Core\Simulator();

$simulator->run();