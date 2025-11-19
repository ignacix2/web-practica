<?php
// PRACTICA1/controller/product_detail_json.php
require_once __DIR__ . '/../modelo/connectaDb.php';
require_once __DIR__ . '/../modelo/productes.php';

header('Content-Type: application/json');

$producto_id = $_GET['product_id'] ?? null;

if ($producto_id) {
    // Utilizamos pg_fetch_assoc en nuestro modelo para devolver un solo producto
    $producto = getProductById($producto_id); 
    echo json_encode($producto);
} else {
    echo json_encode(['error' => 'No ID provided']);
}
?>