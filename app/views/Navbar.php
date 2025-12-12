<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<header>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/touche-pas-au-klaxon/">Touche pas au klaxon</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
            <ul class="navbar-nav align-items-center">

                <?php if(!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="btn btn-primary me-2" href="/touche-pas-au-klaxon/login">Connexion</a>
                    </li>

                <?php elseif($_SESSION['role'] === 'user'): ?>
                    <li class="nav-item">
                        <a class="btn btn-primary me-2" href="/touche-pas-au-klaxon/create-trip">Créer un trajet</a>
                    </li>
                    <li class="nav-item">
                        <span class="navbar-text me-3">
                            Bonjour <?= htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']) ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="/touche-pas-au-klaxon/logout">Déconnexion</a>
                    </li>

                <?php elseif($_SESSION['role'] === 'admin'): ?>
                    <li class="nav-item">
                        <a class="btn btn-primary me-2" href="/touche-pas-au-klaxon/admin/users">Utilisateurs</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary me-2" href="/touche-pas-au-klaxon/admin/agencies">Agences</a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary me-2" href="/touche-pas-au-klaxon/admin/trips">Trajets</a>
                    </li>

                    <li class="nav-item">
                        <span class="navbar-text me-3">
                            Bonjour <?= htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']) ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger" href="/touche-pas-au-klaxon/logout">Déconnexion</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>
</header>
