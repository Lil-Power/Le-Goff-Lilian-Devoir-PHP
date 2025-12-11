<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') die("Accès refusé");

require __DIR__ . '/../../models/AgenciesModel.php';


$agencies = getAgencies();

if (isset($_POST['create'])) {
    addAgency($_POST['name_agency']);
    $_SESSION['flash'] = "Agence créée.";
    header("Location: /touche-pas-au-klaxon/admin/agencies");
    exit;
}


if (isset($_POST['edit'])) {
    updateAgency($_POST['id_agency'], $_POST['name_agency']);
    $_SESSION['flash'] = "Agence modifiée.";
    header("Location: /touche-pas-au-klaxon/admin/agencies");
    exit;
}


if (isset($_GET['delete'])) {
    deleteAgency($_GET['delete']);
    $_SESSION['flash'] = "Agence supprimée.";
    header("Location: /touche-pas-au-klaxon/admin/agencies");
    exit;
}

require __DIR__ . '/../../views/admin/agencies.php';
