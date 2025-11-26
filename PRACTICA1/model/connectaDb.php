<?php
// PRACTICA1/model/connectaDb.php

function getConn(){
    // Datos de conexión (ajustados a los que me has pasado)
    $host = "127.0.0.1";
    $port = "5432";
    $dbname = "tdiw-h4";
    $user = "tdiw-h4";
    $password = "oyZ3Jt2X";

    $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

    $conn = pg_connect($conn_string);

    if (!$conn) {
        // Si falla, lanzamos error para que el JSON lo capture si es posible
        throw new Exception("Error conectando a la base de datos: " . pg_last_error());
    }

    return $conn;
}
// NO cerramos la etiqueta php al final para evitar espacios en blanco accidentales