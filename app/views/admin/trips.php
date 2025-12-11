<?php
ob_start();
?>
<div class="container mt-4">
    <h1 class="mb-4">Gestion des trajets</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Départ</th>
            <th>Date & Heure</th>
            <th>Arrivée</th>
            <th>Date & Heure</th>
            <th>Conducteur</th>
            <th>Places</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($trips as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['departure_name']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($t['departure_datetime'])) ?></td>
                <td><?= htmlspecialchars($t['arrival_name']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($t['arrival_datetime'])) ?></td>
                <td><?= htmlspecialchars($t['first_name'] . ' ' . $t['last_name']) ?></td>
                <td><?= htmlspecialchars($t['available_seats']) ?>/<?= htmlspecialchars($t['total_seats']) ?></td>
                <td>
                    <a href="/touche-pas-au-klaxon/admin/trips/delete?id=<?= $t['id_trip'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Supprimer ce trajet ?');">
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
