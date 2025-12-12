<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) : "Touche pas au klaxon" ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/touche-pas-au-klaxon/app/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>


    <?php require __DIR__ . '/Navbar.php'; ?>

    <main class="container my-4">
        <?= $content ?? '' ?>
    </main>

    <?php require __DIR__ . '/Footer.php'; ?>

</body>
</html>
