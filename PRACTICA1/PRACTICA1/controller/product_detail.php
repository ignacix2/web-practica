<?php

require_once __DIR__ . '/../modelo/connectaDb.php';
require_once __DIR__ . '/../modelo/productes.php';
require_once __DIR__ . '/../modelo/categories.php';

$product_id = $_GET['product_id'] ? (int) $_GET['product_id'] : 1;
$product = getProductById($product_id);
$title = sprintf('%s-%s', $product['title'], $product['author']);
require __DIR__ . '/../view/product_detail.php';