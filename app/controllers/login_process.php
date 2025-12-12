<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . '/../models/UsersModel.php';


$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';


$user = getUserByEmail($email);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['user_id'] = $user['id_user'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['employee_id'] = $user['employee_id'];
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name']  = $user['last_name'];

    header('Location: /touche-pas-au-klaxon/');
    exit;
} else {

    header('Location: /touche-pas-au-klaxon/login?error=1');
    exit;
}

