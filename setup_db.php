<?php
// setup_db.php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/PRACTICA1/model/connectaDb.php';

$conn = getConn();

if (!$conn) {
    die("❌ Error fatal: No se pudo conectar a la base de datos.");
}

echo "<h1>Inicializando Base de Datos...</h1>";

// 1. BORRAR TABLAS ANTIGUAS (Para empezar limpio si ejecutas esto varias veces)
// El orden es importante por las claves foráneas (FOREIGN KEYS)
$sql_drop = "
    DROP TABLE IF EXISTS linia_comanda CASCADE;
    DROP TABLE IF EXISTS comanda CASCADE;
    DROP TABLE IF EXISTS producte CASCADE;
    DROP TABLE IF EXISTS categoria CASCADE;
    DROP TABLE IF EXISTS usuari CASCADE;
";

$result = pg_query($conn, $sql_drop);
if ($result) echo "✅ Tablas antiguas eliminadas (limpieza).<br>";

// 2. CREAR TABLAS (Según tu Diagrama Lógico y PDF Sesión 2)

// Tabla CATEGORIA
$sql_categoria = "
    CREATE TABLE categoria (
        id SERIAL PRIMARY KEY,
        nom VARCHAR(255) NOT NULL
    );
";

// Tabla PRODUCTE (Con referencia a Categoria)
$sql_producte = "
    CREATE TABLE producte (
        id SERIAL PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        preu DECIMAL(10,2) NOT NULL,
        descripcio TEXT,
        imatge VARCHAR(255),
        categoria_id INT REFERENCES categoria(id)
    );
";

// Tabla USUARI (Campos requeridos en Sesión 1)
$sql_usuari = "
    CREATE TABLE usuari (
        id SERIAL PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        adreca VARCHAR(255),
        poblacio VARCHAR(255),
        codi_postal VARCHAR(5),
        imatge VARCHAR(255)
    );
";

// Ejecutamos la creación
if (pg_query($conn, $sql_categoria)) echo "✅ Tabla 'categoria' creada.<br>";
else echo "❌ Error creando 'categoria': " . pg_last_error($conn) . "<br>";

if (pg_query($conn, $sql_producte)) echo "✅ Tabla 'producte' creada.<br>";
else echo "❌ Error creando 'producte': " . pg_last_error($conn) . "<br>";

if (pg_query($conn, $sql_usuari)) echo "✅ Tabla 'usuari' creada.<br>";
else echo "❌ Error creando 'usuari': " . pg_last_error($conn) . "<br>";


// 3. INSERTAR DATOS DE PRUEBA (Semilla)

// Insertar Categorías (Ropa)
$sql_insert_cat = "
    INSERT INTO categoria (nom) VALUES 
    ('Pantalons'), 
    ('Samarretes'), 
    ('Jaquetes'), 
    ('Sabates'),
    ('Accessoris');
";
if (pg_query($conn, $sql_insert_cat)) echo "✅ Datos de categorías insertados.<br>";

// Insertar Productos (Asumiendo IDs 1, 2, 3, 4 para las categorías de arriba)
// Nota: De momento ponemos una imagen genérica o vacía
$sql_insert_prod = "
    INSERT INTO producte (nom, preu, descripcio, categoria_id, imatge) VALUES 
    ('Pantalons Texans', 39.99, 'Pantalons texans clàssics de color blau.', 1, 'assets/img/jeans.jpg'),
    ('Samarreta Blanca', 15.50, 'Samarreta bàsica de cotó.', 2, 'assets/img/tshirt.jpg'),
    ('Jaqueta Cuir', 89.99, 'Jaqueta estil moter de pell sintètica.', 3, 'assets/img/jacket.jpg'),
    ('Cinturó Negre', 12.00, 'Cinturó de pell elegant.', 4, 'assets/img/belt.jpg');
";

if (pg_query($conn, $sql_insert_prod)) echo "✅ Datos de productos insertados.<br>";

echo "<hr><h3>¡Proceso finalizado! Ahora tu web debería funcionar.</h3>";
echo "<a href='index.php'>Volver a la Tienda</a>";
?>