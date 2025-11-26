<?php
// public_html/translate_db.php

// 1. Conectamos
require_once __DIR__ . '/PRACTICA1/model/connectaDb.php';
$conn = getConn();

if (!$conn) die("Error de conexión");

// 2. Ejecutamos las actualizaciones (SQL)
// Cambiamos el nombre antiguo por el nuevo (Inglés Lujo)

$updates = [
    "UPDATE categoria SET nom = 'PANTS' WHERE nom = 'Pantalons'",
    "UPDATE categoria SET nom = 'T-SHIRTS' WHERE nom = 'Samarretes'",
    "UPDATE categoria SET nom = 'JACKETS' WHERE nom = 'Jaquetes'",
    "UPDATE categoria SET nom = 'SHOES' WHERE nom = 'Sabates'",
    "UPDATE categoria SET nom = 'ACCESSORIES' WHERE nom = 'Accessoris'"
];

foreach ($updates as $sql) {
    $result = pg_query($conn, $sql);
    if ($result) {
        echo "✅ Cambio realizado correctamente.<br>";
    } else {
        echo "❌ Error: " . pg_last_error($conn) . "<br>";
    }
}

echo "<br><a href='index.php'>VOLVER A LA WEB</a>";
?>