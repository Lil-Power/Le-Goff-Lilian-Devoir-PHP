<?php
/** error infos */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/** Autoloader */
require_once __DIR__.'/app/class/Autoloader.php';
use App\Autoloader;
Autoloader::register();


$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = rtrim($url, '/');
$prefixUrl = '/touche-pas-au-klaxon';

/** Router */
switch ($url) {

    case $prefixUrl:
    case $prefixUrl.'/home':
        require __DIR__ . "/app/models/TripsModel.php";
        $trips = getTrips();
        require __DIR__ . "/app/views/Home.php";
        break;

    case $prefixUrl.'/login':
        require __DIR__ . "/app/views/Login.php";
        break;

    case $prefixUrl.'/login_process':
        require __DIR__ . '/app/controllers/login_process.php';
        break;

    case $prefixUrl.'/logout':
        require __DIR__ . '/app/controllers/logout.php';
        break;

    case $prefixUrl.'/create-trip':
        require __DIR__ . "/app/views/CreateTrip.php";
        break;

    case $prefixUrl.'/create-trip_process':
        require __DIR__ . "/app/controllers/create-trip_process.php";
        break;

    case $prefixUrl.'/trip':
        require __DIR__ . '/app/controllers/TripsController.php';
        break;

    case $prefixUrl.'/admin/users':
        require __DIR__ . "/app/controllers/admin/UsersAdminController.php";
        break;


    case $prefixUrl.'/admin/agencies':
        require __DIR__ . "/app/controllers/admin/AgenciesAdminController.php";
        break;

    case $prefixUrl.'/admin/agencies/create':
        require __DIR__ . "/app/controllers/admin/CreateAgencyController.php";
        break;

    case $prefixUrl.'/admin/agencies/edit':
        require __DIR__ . "/app/controllers/admin/EditAgencyController.php";
        break;

    case $prefixUrl.'/admin/agencies/delete':
        require __DIR__ . "/app/controllers/admin/DeleteAgencyController.php";
        break;

    case $prefixUrl.'/admin/trips':
        require __DIR__ . "/app/controllers/admin/TripsAdminController.php";
        break;

    case $prefixUrl.'/admin/trips/delete':
        require __DIR__ . "/app/controllers/admin/DeleteTripController.php";
        break;
        
    default:
        echo "Page non trouvée.";
        break;

}
