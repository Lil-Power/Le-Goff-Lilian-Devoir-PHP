<?php
ob_start();
?>
<form method="POST">
    <div class="mb-3">
        <label for="departure_agency_id" class="form-label">Départ :</label>
        <select id="departure_agency_id" name="departure_agency_id" class="form-select" required>
            <?php foreach ($agencies as $agency): ?>
                <option value="<?= $agency['id_agency'] ?>" 
                    <?= $agency['id_agency'] == $trip['departure_agency_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($agency['name_agency']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="arrival_agency_id" class="form-label">Destination :</label>
        <select id="arrival_agency_id" name="arrival_agency_id" class="form-select" required>
            <?php foreach ($agencies as $agency): ?>
                <option value="<?= $agency['id_agency'] ?>" 
                    <?= $agency['id_agency'] == $trip['arrival_agency_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($agency['name_agency']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="departure_datetime" class="form-label">Date & Heure départ :</label>
        <input type="datetime-local" id="departure_datetime" name="departure_datetime" class="form-control" 
               value="<?= date('Y-m-d\TH:i', strtotime($trip['departure_datetime'])) ?>" required>
    </div>

    <div class="mb-3">
        <label for="arrival_datetime" class="form-label">Date & Heure arrivée :</label>
        <input type="datetime-local" id="arrival_datetime" name="arrival_datetime" class="form-control" 
               value="<?= date('Y-m-d\TH:i', strtotime($trip['arrival_datetime'])) ?>" required>
    </div>

    <div class="mb-3">
        <label for="total_seats" class="form-label">Places totales :</label>
        <input type="number" id="total_seats" name="total_seats" class="form-control" value="<?= $trip['total_seats'] ?>" required>
    </div>

    <div class="mb-3">
        <label for="contact_phone" class="form-label">Téléphone :</label>
        <input type="text" id="contact_phone" name="contact_phone" class="form-control" value="<?= htmlspecialchars($trip['contact_phone']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="contact_email" class="form-label">Email :</label>
        <input type="email" id="contact_email" name="contact_email" class="form-control" value="<?= htmlspecialchars($trip['contact_email']) ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Modifier le trajet</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';