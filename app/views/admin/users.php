<?php
ob_start();
?>
<div class="container mt-4">
    <h1 class="mb-4">Gestion des utilisateurs</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom/Prénom</th>
            <th>Identifiant employée</th>
            <th>Numéro de téléphone</th>
            <th>Email</th>

        </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['last_name'] . " " . $u['first_name']) ?></td>
                <td><?= htmlspecialchars($u['employee_id']) ?></td>
                <td><?= htmlspecialchars($u['phone']) ?></td>
                <td><?= htmlspecialchars($u['email']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layout.php';
