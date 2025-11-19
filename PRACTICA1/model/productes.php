<?php
// PRACTICA1/model/productes.php

require_once __DIR__ . '/connectaDb.php';

/**
 * Obtiene todos los productos de una categoría
 */
function getProductsByCategory(int $categoryId): array
{
    $conn = getConn();
    
    // Consulta parametrizada ($1) para seguridad
    // Asegúrate de que la tabla es 'producte' (singular) y la columna 'categoria_id'
    $sql = "SELECT * FROM producte WHERE categoria_id = $1";
    
    $result = pg_query_params($conn, $sql, [$categoryId]);
    
    $productos = pg_fetch_all($result);
    
    return $productos ?: []; // Devuelve array vacío si no hay productos
}

/**
 * Obtiene un producto por su ID (para el detalle)
 */
function getProductById(int $productId)
{
    $conn = getConn();
    
    $sql = "SELECT * FROM producte WHERE id = $1";
    
    $result = pg_query_params($conn, $sql, [$productId]);
    
    // pg_fetch_assoc devuelve una sola fila (o false)
    return pg_fetch_assoc($result);
}
?>