<?php
// PRACTICA1/controller/registre.php

require_once __DIR__ . '/../model/users.php';

// Iniciamos sesión para poder guardar mensajes de error/éxito
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Recoger datos del formulario (limpiando espacios)
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $password = $_POST['password']; // Contraseña original
    $adreca = trim($_POST['adreca']);
    $poblacio = trim($_POST['poblacio']);
    $cp = trim($_POST['codi_postal']);

    // 2. Validación básica
    if (empty($nom) || empty($email) || empty($password)) {
        $_SESSION['error_register'] = "Todos los campos obligatorios deben rellenarse.";
        header("Location: index.php?action=registre");
        exit();
    }

    // 3. ENCRIPTAR CONTRASEÑA (HASHING) - ¡Aquí está la clave!
    // PASSWORD_DEFAULT usa el algoritmo bcrypt, que es el estándar actual.
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // 4. Preparar array para el modelo
    $datosUsuario = [
        'nom' => $nom,
        'email' => $email,
        'password' => $password_hash, // Guardamos la encriptada
        'adreca' => $adreca,
        'poblacio' => $poblacio,
        'codi_postal' => $cp
    ];

    // 5. Guardar en BBDD
    if (registerUser($datosUsuario)) {
        // Éxito
        $_SESSION['success_register'] = "¡Te has registrado correctamente! Ahora inicia sesión.";
        header("Location: index.php?action=login"); // Redirigir al login
        exit();
    } else {
        // Error (probablemente email repetido)
        $_SESSION['error_register'] = "Error al registrar. Puede que el email ya exista.";
        header("Location: index.php?action=registre");
        exit();
    }
}
?>
