<?php
// PRACTICA1/model/productes.php

require_once __DIR__ . '/connectaDb.php';

/**
 * Obtiene todos los productos de una categoría
 */
function getProductsByCategory(int $categoryId): array
{
    $conn = getConn();
    
    $sql = "SELECT * FROM producte WHERE categoria_id = $1";
    
    $result = pg_query_params($conn, $sql, [$categoryId]);
    
    // PROTECCIÓN: Si la consulta falla, devolvemos array vacío en vez de error
    if (!$result) {
        return [];
    }
    
    $productos = pg_fetch_all($result);
    
    return $productos ?: []; 
}

/**
 * Obtiene un producto por su ID (para el detalle)
 */
function getProductById(int $id)
{
    $conn = getConn();
    
    $sql = "SELECT * FROM producte WHERE id = $1";
    
    $result = pg_query_params($conn, $sql, [$id]);
    
    // PROTECCIÓN CRÍTICA: Si la consulta falla, devolvemos false suavemente
    if (!$result) {
        return false;
    }

    // PROTECCIÓN 2: Solo intentamos leer si hay resultados
    return pg_fetch_assoc($result);
}
// NO cerramos la etiqueta php ?>