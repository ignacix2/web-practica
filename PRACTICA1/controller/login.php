<?php
// PRACTICA1/controller/login.php

require_once __DIR__ . '/../model/users.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Només acceptem POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../index.php?action=login");
    exit();
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if ($email === '' || $password === '') {
    $_SESSION['error_login'] = "Cal introduir email i contrasenya.";
    header("Location: ../index.php?action=login");
    exit();
}

$user = getUserByEmail($email);

if (!$user || !password_verify($password, $user['password'])) {
    $_SESSION['error_login'] = "Credencials incorrectes.";
    header("Location: ../index.php?action=login");
    exit();
}

// Autenticat
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['nom'];
$_SESSION['user_email'] = $user['email'];

header("Location: ../index.php?action=account");
exit();
