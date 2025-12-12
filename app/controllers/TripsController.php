<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . '/../models/TripsModel.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /touche-pas-au-klaxon/login');
    exit;
}

$action = $_GET['action'] ?? '';
$trip_id = $_GET['id'] ?? '';

switch($action) {

    case 'edit':
        
        $trip = getTripById($trip_id);

        if ($trip['user_id'] != $_SESSION['user_id']) {
            die("Accès refusé");
        }


        $agencies = getAgencies();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $departure_agency_id = $_POST['departure_agency_id'];
            $arrival_agency_id = $_POST['arrival_agency_id'];
            $departure_datetime = $_POST['departure_datetime'];
            $arrival_datetime = $_POST['arrival_datetime'];
            $total_seats = $_POST['total_seats'];
            $contact_phone = $_POST['contact_phone'];
            $contact_email = $_POST['contact_email'];

            updateTrip(
                $trip_id, 
                $departure_agency_id, 
                $arrival_agency_id, 
                $departure_datetime, 
                $arrival_datetime, 
                $total_seats, 
                $contact_phone, 
                $contact_email
            );
            
            /** flash message for editing a trip */
            $_SESSION['flash_message'] = "Le trajet a été modifié.";
            header('Location: /touche-pas-au-klaxon/');
            exit;
        }

        require __DIR__ . '/../views/EditTrip.php';
        break;

    case 'delete':
        $trip = getTripById($trip_id);

        if ($trip['user_id'] != $_SESSION['user_id']) {
            die("Accès refusé");
        }

        deleteTrip($trip_id);
        
        /** flash message for deleting a trip */
        $_SESSION['flash_message'] = "Le trajet a été supprimé.";
        header('Location: /touche-pas-au-klaxon/');
        exit;

    default:
        die("Action non reconnue");
}
