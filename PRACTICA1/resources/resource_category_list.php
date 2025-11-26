<?php 
// =====================================================
// 1. LÓGICA DE DATOS
// =====================================================

// Cargamos los modelos
require_once __DIR__ . '/../model/connectaDb.php'; 
require_once __DIR__ . '/../model/categories.php';

// Obtenemos las categorías
$categories = getCategories(); 

// =====================================================
// 2. VISTA (HTML)
// =====================================================

// Incluimos el Header
require __DIR__ . '/../view/header.php'; 
?>

<div class="hero-container">
    <img src="<?php echo BASE_URL . 'img/hero_model.jpg'; ?>" alt="Singh Campaign" class="hero-image">
    
    <div class="hero-overlay">
        <div class="hero-subtitle">NEW LAUNCH</div>
        <h1 class="hero-title">DRESS LIKE A KING</h1>
        
        <button class="hero-btn" onclick="document.getElementById('category-nav-anchor').scrollIntoView({behavior: 'smooth'});">
            SHOP COLLECTION
        </button>
    </div>
</div>

<div id="category-nav-anchor"></div>

<nav class="category-nav">
    <?php if (!empty($categories)): ?>
        <?php foreach ($categories as $category): ?>
            <a href="#" 
               class="category-link"
               onclick="cargarProductos(<?php echo $category['id']; ?>); return false;">
                <?php echo htmlspecialchars($category['nom']); ?>
            </a>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay categorías disponibles.</p>
    <?php endif; ?>
</nav>

<div class="container" style="min-height: 50vh;">
    <div id="contenedor-productos">
        <p class="text-placeholder">
            SELECT A CATEGORY TO VIEW THE COLLECTION
        </p>
    </div>
</div>

<footer style="text-align: center; padding: 40px; background-color: #111; color: white; margin-top: 80px;">
    <h2 style="font-family: 'Cinzel'; margin-bottom: 10px;">SINGH</h2>
    <p style="font-size: 0.7rem; color: #666;">EST. 2025 | BARCELONA</p>
</footer>

<script>
// Función para cargar PRODUCTOS de una categoría
function cargarProductos(idCategoria) {
    const contenedor = document.getElementById('contenedor-productos');
    contenedor.innerHTML = '<p style="text-align:center; margin-top:50px;">LOADING...</p>';

    // Efecto visual: marcar categoría activa
    document.querySelectorAll('.category-link').forEach(el => el.style.color = '#000'); // Reset a negro (bold)
    if (event && event.target) event.target.style.textDecoration = 'underline'; // Subrayado simple visual

    // FETCH
    fetch('index.php?action=productes_json&category_id=' + idCategoria)
        .then(response => response.json())
        .then(productos => {
            if (productos.length === 0) {
                contenedor.innerHTML = '<p style="text-align:center;">NO ITEMS FOUND.</p>';
                return;
            }

            let html = '<div class="producto-grid">';
            productos.forEach(p => {
                html += `
                    <div class="producto-card" onclick="cargarDetalle(${p.id})">
                        <img src="${p.imatge}" alt="${p.nom}">
                        <div class="producto-info">
                            <div class="producto-title">${p.nom.toUpperCase()}</div>
                            <div class="producto-price">${p.preu} EUR</div>
                        </div>
                    </div>
                `;
            });
            html += '</div>';
            contenedor.innerHTML = html;
        })
        .catch(err => {
            console.error(err);
            contenedor.innerHTML = '<p style="color:red; text-align:center;">Error loading products.</p>';
        });
}

// Función para cargar el DETALLE de un producto (CORREGIDA)
function cargarDetalle(idProducto) {
    const contenedor = document.getElementById('contenedor-productos');
    contenedor.innerHTML = '<p style="text-align:center; margin-top:50px;">LOADING DETAILS...</p>';

    fetch('index.php?action=detall_producte_json&id=' + idProducto)
        .then(response => {
            // Verificamos si la respuesta es OK
            if (!response.ok) {
                return response.text().then(text => { throw new Error(text) });
            }
            return response.json();
        })
        .then(producto => {
            if (producto.error) {
                contenedor.innerHTML = `<p style="text-align:center; color:red;">${producto.error}</p>`;
                return;
            }

            const html = `
                <div class="detalle-producto" style="display: flex; gap: 40px; max-width: 1000px; margin: 40px auto; align-items: start; flex-wrap: wrap;">
                    
                    <div style="flex: 1; min-width: 300px;">
                        <img src="${producto.imatge}" alt="${producto.nom}" style="width: 100%; object-fit: cover;">
                    </div>

                    <div style="flex: 1; padding-top: 20px; min-width: 300px;">
                        <button onclick="cargarProductos(${producto.categoria_id})" style="background:none; border:none; cursor:pointer; text-decoration:underline; margin-bottom:20px; font-family:'Montserrat';">
                            &larr; BACK TO COLLECTION
                        </button>
                        
                        <h2 style="font-family: 'Cinzel', serif; font-size: 2.5rem; margin-bottom: 10px;">${producto.nom.toUpperCase()}</h2>
                        <p style="font-size: 1.5rem; color: #555; margin-bottom: 20px;">${producto.preu} EUR</p>
                        <p style="line-height: 1.6; color: #666; margin-bottom: 30px;">${producto.descripcio}</p>
                        
                        <div class="actions">
                            <button style="background: #000; color: #fff; padding: 15px 30px; border: none; font-family: 'Montserrat'; letter-spacing: 2px; cursor: pointer; width: 100%;">
                                ADD TO BAG
                            </button>
                        </div>
                    </div>
                </div>
            `;
            
            contenedor.innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            contenedor.innerHTML = `<div style="text-align:center; color:red; padding:50px;">
                <h3>⚠️ ERROR DE CONEXIÓN</h3>
                <p>El servidor ha fallado. Mira la consola.</p>
            </div>`;
        });
}
</script>

</body>
</html>