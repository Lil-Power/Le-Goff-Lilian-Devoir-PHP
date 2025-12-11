<?php
require __DIR__ . "/../core/defaultModel.php";

/** get all trips informations*/
function getTrips() {
    $stmt = "
        SELECT t.*, 
               da.name_agency AS departure_name, 
               aa.name_agency AS arrival_name,
               e.first_name,
               e.last_name,
               e.phone AS contact_phone,
               e.email AS contact_email
        FROM trips t
        JOIN agencies da ON t.departure_agency_id = da.id_agency
        JOIN agencies aa ON t.arrival_agency_id = aa.id_agency
        JOIN employees e ON t.user_id = e.id_employee
        ORDER BY t.departure_datetime ASC
    ";
    return findAll($stmt);
}

/** get all agencies */
function getAgencies() {
    $stmt = "SELECT * FROM agencies ORDER BY name_agency ASC";
    return findAll($stmt);
}

/** create a trip */
function createTrip($user_id, $departure_agency_id, $arrival_agency_id, $departure_datetime, $arrival_datetime, $total_seats, $contact_phone, $contact_email) {
    $bdd = connection();
    $stmt = $bdd->prepare("
        INSERT INTO trips 
        (user_id, departure_agency_id, arrival_agency_id, departure_datetime, arrival_datetime, total_seats, available_seats, contact_phone, contact_email, created_at, updated_at)
        VALUES
        (:user_id, :departure_agency_id, :arrival_agency_id, :departure_datetime, :arrival_datetime, :total_seats, :available_seats, :contact_phone, :contact_email, NOW(), NOW())
    ");

    return $stmt->execute([
        'user_id' => $user_id,
        'departure_agency_id' => $departure_agency_id,
        'arrival_agency_id' => $arrival_agency_id,
        'departure_datetime' => $departure_datetime,
        'arrival_datetime' => $arrival_datetime,
        'total_seats' => $total_seats,
        'available_seats' => $total_seats,
        'contact_phone' => $contact_phone,
        'contact_email' => $contact_email,
    ]);
}
function getTripById($trip_id) {
    $bdd = connection();
    $stmt = $bdd->prepare("SELECT * FROM trips WHERE id_trip = :id_trip LIMIT 1");
    $stmt->execute(['id_trip' => $trip_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/** update a trip */
function updateTrip($id_trip, $departure_agency_id, $arrival_agency_id, $departure_datetime, $arrival_datetime, $total_seats, $contact_phone, $contact_email) {
    $bdd = connection();
    $stmt = $bdd->prepare("
        UPDATE trips SET 
            departure_agency_id = :departure_agency_id,
            arrival_agency_id = :arrival_agency_id,
            departure_datetime = :departure_datetime,
            arrival_datetime = :arrival_datetime,
            total_seats = :total_seats,
            available_seats = :total_seats,
            contact_phone = :contact_phone,
            contact_email = :contact_email,
            updated_at = NOW()
        WHERE id_trip = :id_trip
    ");
    return $stmt->execute([
        'departure_agency_id' => $departure_agency_id,
        'arrival_agency_id' => $arrival_agency_id,
        'departure_datetime' => $departure_datetime,
        'arrival_datetime' => $arrival_datetime,
        'total_seats' => $total_seats,
        'contact_phone' => $contact_phone,
        'contact_email' => $contact_email,
        'id_trip' => $id_trip,
    ]);
}

/** delete a trip */
function deleteTrip($id_trip) {
    $bdd = connection();
    $stmt = $bdd->prepare("DELETE FROM trips WHERE id_trip = :id_trip");
    return $stmt->execute(['id_trip' => $id_trip]);
}
