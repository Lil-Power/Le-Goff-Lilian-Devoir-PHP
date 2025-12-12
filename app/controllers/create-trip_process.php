<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: /touche-pas-au-klaxon/login');
    exit;
}

require_once __DIR__ . '/../models/TripsModel.php';

$departure_agency_id = $_POST['departure_agency_id'] ?? '';
$arrival_agency_id = $_POST['arrival_agency_id'] ?? '';
$departure_datetime = $_POST['departure_datetime'] ?? '';
$arrival_datetime = $_POST['arrival_datetime'] ?? '';
$total_seats = $_POST['total_seats'] ?? '';
$contact_phone = $_POST['contact_phone'] ?? '';
$contact_email = $_POST['contact_email'] ?? '';
$user_id = $_SESSION['user_id'];


if (createTrip($user_id, $departure_agency_id, $arrival_agency_id, $departure_datetime, $arrival_datetime, $total_seats, $contact_phone, $contact_email)) {
    header('Location: /touche-pas-au-klaxon/');
    exit;
} else {
    die("Erreur lors de la création du trajet.");
}
