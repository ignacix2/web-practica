<?php

require_once __DIR__ . '/connectaDb.php'; // Assegura't que tens accés a la connexió

/**
 * Retorna totes les categories de la base de dades.
 * @return array
 */

/**
 * Obté una categoria pel seu ID
 * @param int $id
 * @return array|false
 */
function getCategoryById(int $id)
{
    $conn = getConn();
    // Assegura't que la taula es diu 'categoria' (singular)
    $sql = "SELECT * FROM categoria WHERE id = $1";
    $result = pg_query_params($conn, $sql, [$id]);
    
    return pg_fetch_assoc($result);
}

function getCategories(): array
{
    $conn = getConn();
    
    // Nota: Assegura't que la taula es diu 'categoria' (singular) a la teva BD postgreSQL
    $sql = "SELECT * FROM categoria"; 
    
    $result = pg_query($conn, $sql);
    
    $filas = pg_fetch_all($result);

    // CORRECCIÓ CLAU:
    // Si $filas és 'false' (no hi ha dades), retornem un array buit []
    // L'operador ?: fa exactament això (Elvis operator)
    return $filas ?: [];
}