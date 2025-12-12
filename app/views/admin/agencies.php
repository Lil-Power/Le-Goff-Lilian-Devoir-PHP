<?php
ob_start();
?>
<div class="container mt-4">
    <h1 class="mb-4">Gestion des agences</h1>


    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title"><?= isset($agency) ? "Modifier une agence" : "Créer une agence" ?></h5>

            <form method="POST"
                  action="/touche-pas-au-klaxon/admin/agencies/<?= isset($agency) ? "update?id=".$agency['id_agency'] : "create" ?>">

                <div class="mb-3">
                    <label class="form-label">Nom de l'agence</label>
                    <input type="text" name="name_agency" class="form-control"
                           value="<?= $agency['name_agency'] ?? '' ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    <?= isset($agency) ? "Mettre à jour" : "Créer" ?>
                </button>

                <?php if (isset($agency)): ?>
                    <a href="/touche-pas-au-klaxon/admin/agencies" class="btn btn-secondary">Annuler</a>
                <?php endif; ?>

            </form>
        </div>
    </div>


    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($agencies as $a): ?>
            <tr>
                <td><?= htmlspecialchars($a['name_agency']) ?></td>
                <td>
                    <a href="/touche-pas-au-klaxon/admin/agencies/edit?id=<?= $a['id_agency'] ?>"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <a href="/touche-pas-au-klaxon/admin/agencies/delete?id=<?= $a['id_agency'] ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Supprimer cette agence ?');">
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
