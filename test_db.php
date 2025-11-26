<?php
// test_db.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Ajusta la ruta si tu carpeta se llama 'model' o 'modelo'
require_once __DIR__ . '/PRACTICA1/model/connectaDb.php'; 

$conn = getConn();

if (!$conn) {
    die("❌ Error: No se pudo conectar a la base de datos.");
}

echo "✅ Conexión exitosa.<br><br>";

// Consultar qué tablas existen en el esquema público
$sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'";
$result = pg_query($conn, $sql);

if ($result) {
    echo "<strong>Tablas encontradas en tu base de datos:</strong><br>";
    $tablas = pg_fetch_all($result);
    
    if (empty($tablas)) {
        echo "⚠️ No se encontraron tablas. ¿Has ejecutado el script SQL de creación?";
    } else {
        echo "<pre>";
        print_r($tablas);
        echo "</pre>";
    }
} else {
    echo "❌ Error al consultar las tablas: " . pg_last_error($conn);
}
?>