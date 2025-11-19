<?php
require_once __DIR__."/connectaDb.php";

$sql='<SELECT id, "name"
        FROM category
        WHERE id = $1>';

// Funció per obtenir el llistat de productes per ID de categoria.
// Utilitza $1 com a placeholder per a la consulta parametritzada
function getProductesByCategoryId(int $category_id): array{
    $conn = getConn();
    $sql = "SELECT *
     FROM producte 
     WHERE category_id = $1";

    $params = [$category_id];
    $result = pg_query_params($conn, $sql, $params);
    $products = pg_fetch_all($result);
    return $products ? :[];//Retorna un array o un array buit si no hi ha resultats
}

function getProductById(int $product_id): array|bool {
    // ... Implementació amb pg_fetch_assoc per a un únic resultat
    $conn = getConn();
    $sql = "SELECT id, nom, price, description, categoria_id FROM producte WHERE id = $1";
    $params = [$product_id];
    
    $result = pg_query_params($conn, $sql, $params);
    
    return pg_fetch_assoc($result) ?: false; // pg_fetch_assoc per un únic registre.