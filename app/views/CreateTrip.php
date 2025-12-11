<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: /touche-pas-au-klaxon/login');
    exit;
}


require_once __DIR__ . '/../models/TripsModel.php';
$agencies = getAgencies();
?>
<?php
ob_start();
?>
<h2>Créer un trajet</h2>

<form action="/touche-pas-au-klaxon/create-trip_process" method="POST">
    <div class="mb-3">
        <label for="departure_agency" class="form-label">Agence de départ :</label>
        <select id="departure_agency" name="departure_agency_id" class="form-select" required>
            <option value="">Sélectionnez...</option>
            <?php foreach ($agencies as $agency): ?>
                <option value="<?= $agency['id_agency'] ?>"><?= htmlspecialchars($agency['name_agency']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="arrival_agency" class="form-label">Agence d'arrivée :</label>
        <select id="arrival_agency" name="arrival_agency_id" class="form-select" required>
            <option value="">Sélectionnez...</option>
            <?php foreach ($agencies as $agency): ?>
                <option value="<?= $agency['id_agency'] ?>"><?= htmlspecialchars($agency['name_agency']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="departure_datetime" class="form-label">Date et heure de départ :</label>
        <input type="datetime-local" id="departure_datetime" name="departure_datetime" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="arrival_datetime" class="form-label">Date et heure d'arrivée :</label>
        <input type="datetime-local" id="arrival_datetime" name="arrival_datetime" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="total_seats" class="form-label">Nombre de places :</label>
        <input type="number" id="total_seats" name="total_seats" class="form-control" min="1" required>
    </div>

    <div class="mb-3">
        <label for="contact_phone" class="form-label">Téléphone :</label>
        <input type="text" id="contact_phone" name="contact_phone" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="contact_email" class="form-label">Email :</label>
        <input type="email" id="contact_email" name="contact_email" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Créer le trajet</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';