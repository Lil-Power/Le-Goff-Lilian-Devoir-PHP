<?php
ob_start();
?>
<h2>Connexion</h2>

<?php if(isset($_GET['error'])): ?>
    <div class="alert alert-danger">Identifiant ou mot de passe incorrect.</div>
<?php endif; ?>

<form action="/touche-pas-au-klaxon/login_process" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label">Email :</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe :</label>
        <input type="password" id="password" name="password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php
$content = ob_get_clean();
require __DIR__ . '/layout.php';