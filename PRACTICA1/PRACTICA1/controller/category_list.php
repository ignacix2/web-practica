<?php
// PRACTICA1/controller/category_list.php

// 1. Cargamos los modelos
require_once __DIR__ . "/../model/connectaDb.php";
require_once __DIR__ . "/../model/categories.php";

// 2. Pedimos los datos a la base de datos
$categories = getCategories();

// 3. Cargamos la VISTA (El archivo que está en la carpeta 'view')
// AQUÍ ESTABA EL ERROR:
require __DIR__ . "/../view/category_list.php";
?>