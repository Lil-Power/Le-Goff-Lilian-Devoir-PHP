<?php
if (session_status() === PHP_SESSION_NONE) session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') die("Accès refusé");

require __DIR__ . '/../../models/UsersModel.php';

$users = getAllUsers();

require __DIR__ . '/../../views/admin/users.php';
