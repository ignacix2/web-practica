<?php
// index.php - Encaminador (Router) de la Botiga Virtual

// 1. Definir la URL Base (molt útil per a enllaços i rutes)
// Defineix aquesta constant en algun fitxer de configuració si el tens, 
// o directament aquí si no tens un fitxer Config.php
if (!defined('BASE_URL')) {
    // Utilitza el path relatiu al teu projecte si cal
    define('BASE_URL', '/'); 
}

// 2. Obtenir l'acció des de la URL
// Si no hi ha 'action' (és a dir, s'accedeix a la URL principal), 
// carreguem la pàgina de categories per defecte.
$action = $_GET['action'] ?? 'categories'; 

// 3. Analitzar l'acció i carregar el fitxer corresponent
switch ($action) {
    
    // --- Rutes per a pàgines (Càrrega completa) ---
    
    case 'categories':
        // Mostra el llistat de categories (amb el contingut del body)
        require __DIR__ . "/PRACTICA1/resource_category_list.php";
        break;
    
    case 'productes':
        // Mostra el llistat de productes d'una categoria específica
        require __DIR__ . "/PRACTICA1/resource_product_list.php";
        break;
    
    case 'detalle_producte':
        // Mostra el detall del producte (Navegació tradicional de la Sessió 2)
        require __DIR__ . "/PRACTICA1/resource_product_detail.php";
        break;
    
    case 'registre':
        // Formulari i processament del registre d'usuari (Sessió 3)
        require __DIR__ . "/PRACTICA1/resource_registre.php";
        break;
        
    // --- Rutes per a AJAX / FETCH (Retornen JSON) ---
    
    case 'productes_json': 
        // Endpoint per a obtenir el llistat de productes via FETCH (Sessió 3)
        require __DIR__ . "/PRACTICA1/controller/products_json.php";
        break;
        
    case 'detall_producte_json':
        // Endpoint per a obtenir el detall del producte via FETCH (Sessió 3)
        require __DIR__ . "/PRACTICA1/controller/product_detail_json.php";
        break;
        
    // --- Acció per Defecte o Error 404 ---
    
    default:
        // Si l'acció no es reconeix, tornem a la pàgina d'inici (categories)
        header('Location: index.php?action=categories');
        exit;
}