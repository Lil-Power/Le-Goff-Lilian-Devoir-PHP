<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** Autoloader */
require_once __DIR__.'/app/class/Autoloader.php';
use App\Autoloader;
Autoloader::register();


use App\Models\TripsModel;
use App\Views\Template;

/** Routeur */
$prefixUrl = '/touche-pas-au-klaxon';
$url = rtrim($_SERVER['REQUEST_URI'], '/');

if ($url === $prefixUrl){
    require('./app/views/Home.php');
} elseif ($url === $prefixUrl.''){
    require('./app/views/');
} else {
    require('./app/views/Home.php');
}
