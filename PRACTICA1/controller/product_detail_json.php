<?php
// PRACTICA1/controller/product_detail_json.php

// 1. Limpieza de buffer para evitar basura antes del JSON
ob_clean();

// 2. Configuración de errores (Ocultos para no romper JSON)
ini_set('display_errors', 0);
error_reporting(E_ALL);

// 3. Cabecera JSON
header('Content-Type: application/json; charset=utf-8');

try {
    // 4. Incluir modelos (Asegúrate de que la carpeta se llama 'model' o 'modelo' según tu estructura)
    // Según tus últimos mensajes, tu carpeta es 'model'
    require_once __DIR__ . '/../model/connectaDb.php';
    require_once __DIR__ . '/../model/productes.php';

    // 5. Recoger ID
    $productId = (int) ($_GET['id'] ?? 0);

    // 6. Buscar producto
    // Verificamos si la función existe para evitar Fatal Errors
    if (!function_exists('getProductById')) {
        throw new Exception("La función getProductById no está definida en el modelo.");
    }

    $product = getProductById($productId);

    // 7. Devolver respuesta
    if ($product) {
        echo json_encode($product);
    } else {
        echo json_encode(['error' => 'Producto no encontrado (ID: ' . $productId . ')']);
    }

} catch (Throwable $e) {
    // Capturamos cualquier error fatal y lo mostramos como JSON
    echo json_encode(['error' => 'Error del Servidor: ' . $e->getMessage()]);
}
?>