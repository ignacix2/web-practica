<?php
require_once __DIR__ . '/PRACTICA1/model/connectaDb.php';
$conn = getConn();

// Limpiamos productos anteriores de estas categorías para no duplicar
// (Opcional: si quieres borrar todo, usa "DELETE FROM producte")
pg_query($conn, "DELETE FROM producte WHERE categoria_id IN (1, 2, 3, 4, 5)");

$sql = "INSERT INTO producte (nom, preu, descripcio, categoria_id, imatge) VALUES 
-- PANTS (ID 1)
('SINGH Straight Denim', 180.00, 'Pantalones vaqueros de corte recto y cintura alta en denim japonés índigo oscuro. Costuras en contraste blanco que resaltan la estructura arquitectónica. Diseño minimalista de 5 bolsillos con remaches de plata.', 1, 'img/blue_jeans.png'),
('Heather Grey Lounge', 145.00, 'Pantalones de chándal de pierna ancha en algodón orgánico pesado. Cintura elástica con cordón ajustable y acabado premium. La fusión perfecta entre confort deportivo y elegancia urbana.', 1, 'img/grey_pants.png'),
('Pleated Wool Trousers', 210.00, 'Pantalones de sastre negros con doble pinza frontal y corte balloon relajado. Confeccionados en lana fría italiana. Silueta volumétrica que redefine la sastrería clásica masculina.', 1, 'img/black_pants.png'),

-- T-SHIRTS (ID 2)
('Midnight Navy Tee', 85.00, 'Camiseta esencial en azul medianoche. Algodón mercerizado de tacto sedoso con cuello redondo reforzado. Ajuste regular fit diseñado para una caída impecable y duradera.', 2, 'img/blue_marine.png'),
('Noir Knit Polo', 130.00, 'Polo de punto fino en negro profundo con cuello abierto sin botones (Johnny collar). Textura suave y transpirable. Un clásico moderno para un look sofisticado sin esfuerzo.', 2, 'img/black_polo.png'),
('Espresso Long Sleeve', 95.00, 'Camiseta de manga larga en tono marrón espresso con textura flameada (slub cotton). Corte ajustado que realza la figura. Ideal para layering o como pieza central minimalista.', 2, 'img/brown_tshirt.png'),
('Onyx Henley', 110.00, 'Camiseta estilo Henley en negro ónix con tapeta de cuatro botones. Tejido waffle térmico de alta densidad. Mangas largas con puños acanalados para un estilo robusto y masculino.', 2, 'img/black_henley.png'),

-- JACKETS (ID 3)

('Olive Mohair Crop', 149.00, 'Chaqueta de mohair cepillado con corte asimétrico y solapas anchas. Textura suave y silueta boxy.', 3, 'img/mohair_olive.png'),
('Obsidian Velvet Shirt', 120.00, 'Sobrecamisa de terciopelo negro con textura desgastada. Corte recto y bolsillos frontales.', 3, 'img/black_velvet.png'),
('Crimson Asym Jacket', 189.00, 'Chaqueta de lana virgen en rojo burdeos con cierre diagonal de botones a presión. Cuello mao.', 3, 'img/red_asym.png'),
('Suede Fireman Jacket', 250.00, 'Cazadora de ante premium en marrón tabaco con cierres metálicos tipo bombero. Estructura arquitectónica.', 3, 'img/fireman_brown.png'),
-- SABATES (ID 4)
('Hybrid Tassel Loafer', 290.00, 'Mocasín híbrido en piel negra pulida con borlas clásicas. Suela deportiva de goma gruesa que aporta modernidad y comodidad. La reinvención del calzado tradicional.', 4, 'img/mocasin_deportivo.png'),
('Python Effect Loafer', 320.00, 'Mocasines statement en piel con grabado efecto pitón en tonos marrones. Suela track negra robusta. Un accesorio audaz para elevar cualquier conjunto monocromático.', 4, 'img/mocasin_animal.png'),
 -- ACCESORIS (ID 5)
('Western Buckle Belt', 150.00, 'Cinturón de piel negra envejecida con hebilla metálica de estilo western grabada. Puntera y pasador metálicos a juego. El toque rebelde para denim o sastrería.', 5, 'img/cinturon_cowboy.png'),
('Two Ring Pack', 20.00, 'Pack de dos anillos de lujo en plata esterlina con acabados pulidos y mate. Diseñados para combinarse o usarse por separado, aportan un toque sofisticado y moderno a cualquier look.', 5, 'img/two_ring_pack1.png');";

$result = pg_query($conn, $sql);

if ($result) {
    echo "<h1>✅ COLECCIÓN COMPLETA ACTUALIZADA</h1>";
    echo "<p>Pantalones, Camisetas, Chaquetas, Zapatos y Accesorios insertados.</p>";
    echo "<a href='index.php'>Ir a la Tienda</a>";
} else {
    echo "❌ Error: " . pg_last_error($conn);
}
?>