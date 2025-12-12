<?php
require_once __DIR__ . '/../core/defaultModel.php';

function getUserByEmail($email) {
    $bdd = connection();
    $stmt = $bdd->prepare("
        SELECT u.id_user, u.employee_id, u.role, u.password,
               e.first_name, e.last_name
        FROM users u
        JOIN employees e ON u.employee_id = e.id_employee
        WHERE e.email = :email
        LIMIT 1
    ");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function getAllUsers() {
    $bdd = connection();
    $stmt = $bdd->query("
        SELECT 
            u.id_user,
            u.employee_id,
            u.role,
            e.first_name,
            e.last_name,
            e.phone,
            e.email
        FROM users u
        INNER JOIN employees e ON u.employee_id = e.id_employee
        ORDER BY e.last_name ASC;
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}