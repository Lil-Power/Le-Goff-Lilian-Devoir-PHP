<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') die("Accès refusé");

require __DIR__ . '/../../models/TripsModel.php';

$trips = getTrips();

if (isset($_GET['delete'])) {
    deleteTrip($_GET['delete']);
    $_SESSION['flash'] = "Trajet supprimé.";
    header("Location: /touche-pas-au-klaxon/admin/trips");
    exit;
}

require __DIR__ . '/../../views/admin/trips.php';
