<?php
// PRACTICA1/controller/products_json.php

require_once __DIR__ . '/../model/productes.php';

// 2. Indicamos al navegador que esto es JSON, no HTML
header('Content-Type: application/json');

// 3. Obtenemos el ID de la categoría
$categoryId = (int) ($_GET['category_id'] ?? 0);

// 4. Obtenemos los productos usando nuestra función existente
$products = getProductsByCategory($categoryId);

// 5. Devolvemos los datos en formato JSON
echo json_encode($products);
?>