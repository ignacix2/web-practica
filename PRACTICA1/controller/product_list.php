<?php
// PRACTICA1/controller/product_list.php

require_once __DIR__ . '/../model/connectaDb.php';
require_once __DIR__ . '/../model/categories.php';
require_once __DIR__ . '/../model/productes.php';

// 1. Corregim el Warning utilitzant '??'
// Si no hi ha category_id a la URL, fem servir la 1 per defecte
$category_id = (int) ($_GET['category_id'] ?? 1);

// 2. Ara cridem a la funció (que has d'haver afegit al model categories.php!)
$category = getCategoryById($category_id);

// 3. Control d'errors per si la categoria no existeix
if (!$category) {
    die("Error: La categoria amb ID $category_id no existeix.");
}

// 4. Obtenim els productes
$products = getProductsByCategory($category_id);

// 5. Preparem dades per a la vista
// ATENCIÓ: Assegura't que a la base de dades el camp es diu 'nom'
$title = $category['nom']; 

require __DIR__ . '/../view/product_list.php';
?>