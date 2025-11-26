<?php
// PRACTICA1/model/users.php

require_once __DIR__ . '/connectaDb.php';

/**
 * Registra un nuevo usuario en la base de datos.
 * @param array $datos Array con la información del usuario (la contraseña YA debe venir hasheada).
 * @return bool True si se guardó bien, False si falló.
 */
function registerUser($datos) {
    $conn = getConn();

    // Consulta SQL con marcadores ($1, $2...) para seguridad (Prepared Statements)
    $sql = "INSERT INTO usuari (nom, email, password, adreca, poblacio, codi_postal) 
            VALUES ($1, $2, $3, $4, $5, $6)";

    // Preparamos los parámetros en el orden exacto
    $params = [
        $datos['nom'],
        $datos['email'],
        $datos['password'], // Aquí llegará el hash, no la contraseña real
        $datos['adreca'],
        $datos['poblacio'],
        $datos['codi_postal']
    ];

    // Ejecutamos
    $result = pg_query_params($conn, $sql, $params);

    return $result !== false;
}

/**
 * Retorna un usuari pel seu email o false si no existeix.
 */
function getUserByEmail(string $email) {
    $conn = getConn();

    $sql = "SELECT * FROM usuari WHERE email = $1 LIMIT 1";
    $result = pg_query_params($conn, $sql, [$email]);

    if (!$result) {
        return false;
    }

    return pg_fetch_assoc($result);
}
?>
