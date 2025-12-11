<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Touche pas au klaxon !</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="/touche-pas-au-klaxon/app/assets/css/style.css">
</head>
<body>

<?php
ob_start();
?>

<main class="container my-4">

    <!-- flash message -->
    <?php if(isset($_SESSION['flash_message'])): ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($_SESSION['flash_message']) ?>
        </div>
        <?php unset($_SESSION['flash_message']); ?>
    <?php endif; ?>

    <!-- h1 for connected/deconnected user -->

<?php if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])): ?>
    <h1>Trajets proposés</h1>
<?php else: ?>
    <h1>Pour obtenir plus d'informations sur un trajet, veuillez vous connecter</h1>
<?php endif; ?>


    
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Départ</th>
                <th>Date & Heure</th>
                <th>Destination</th>
                <th>Date & Heure</th>
                <th>Places disponibles</th>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($trips as $trip): ?>
            <tr>
                <td><?= htmlspecialchars($trip['departure_name']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($trip['departure_datetime'])) ?></td>
                <td><?= htmlspecialchars($trip['arrival_name']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($trip['arrival_datetime'])) ?></td>
                <td><?= $trip['available_seats'] ?> / <?= $trip['total_seats'] ?></td>

                <?php if(isset($_SESSION['user_id'])): ?>
                <td>
                    <!-- info btn -->
                    <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#tripModal<?= $trip['id_trip'] ?>">
                        Infos
                    </button>

                    <?php if ($_SESSION['user_id'] == $trip['user_id']): ?>
                        <!-- edit/delete btn -->
                        <a href="/touche-pas-au-klaxon/trip?action=edit&id=<?= $trip['id_trip'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/touche-pas-au-klaxon/trip?action=delete&id=<?= $trip['id_trip'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?');">Supprimer</a>
                    <?php endif; ?>
                </td>
                <?php endif; ?>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="tripModal<?= $trip['id_trip'] ?>" tabindex="-1" aria-labelledby="tripModalLabel<?= $trip['id_trip'] ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="tripModalLabel<?= $trip['id_trip'] ?>">Informations du trajet</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Conducteur :</strong> <?= htmlspecialchars($trip['first_name'] . ' ' . $trip['last_name']) ?></p>
                            <p><strong>Téléphone :</strong> <?= htmlspecialchars($trip['contact_phone']) ?></p>
                            <p><strong>Email :</strong> <?= htmlspecialchars($trip['contact_email']) ?></p>
                            <p><strong>Places totales :</strong> <?= $trip['total_seats'] ?></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        </tbody>
    </table>

</main>
</body>
</html>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';