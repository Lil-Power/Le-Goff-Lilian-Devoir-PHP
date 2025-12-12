<?php
require_once __DIR__ . '/../core/defaultModel.php';

function getAgencies() {
    $stmt = "SELECT * FROM agencies ORDER BY name_agency ASC";
    return findAll($stmt);
}

function addAgency($name_agency) {
    $bdd = connection();
    $stmt = $bdd->prepare("
        INSERT INTO agencies (name_agency, created_at, updated_at)
        VALUES (:name_agency, NOW(), NOW())
    ");
    return $stmt->execute(['name_agency' => $name_agency]);
}

function updateAgency($id_agency, $name_agency) {
    $bdd = connection();
    $stmt = $bdd->prepare("
        UPDATE agencies
        SET name_agency = :name_agency, updated_at = NOW()
        WHERE id_agency = :id_agency
    ");
    return $stmt->execute([
        'id_agency' => $id_agency,
        'name_agency' => $name_agency
    ]);
}

function deleteAgency($id_agency) {
    $bdd = connection();
    $stmt = $bdd->prepare("DELETE FROM agencies WHERE id_agency = :id_agency");
    return $stmt->execute(['id_agency' => $id_agency]);
}
