<?php

require_once __DIR__ . '/../model/connectaDb.php';

require_once __DIR__ . '/../model/categories.php';
require_once __DIR__ . '/../model/productes.php';

$categories = $_GET['category_id'] ? (int) $_GET['category_id'] : 1;
$category = getCategoryById($categoryId);
$products = getProductsByCategory($categoryId);

$title = $category['name'];

require __DIR__ . '/../view/product_list.php';