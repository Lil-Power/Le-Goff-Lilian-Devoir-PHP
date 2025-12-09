<?php

/** Routeur */

$prefixUrl = '/touche-pas-au-klaxon/';
$url = $_SERVER['REQUEST_URI'];

if ($url == $prefixUrl.''){
  require('./views/home.php');
} elseif ($url == $prefixUrl.'contact'){
  require('./views/contact.php');
} else {
  require ('./views/404.php');
}

/** Autoloader */
use App\Autoloader;

require_once 'class/Autoloader.php';
Autoloader::register();
?>