<nav class="category-nav">
    <?php foreach ($categories as $category): ?>
        <a href="#" 
           class="category-link"
           onclick="cargarProductos(<?php echo $category['id']; ?>); return false;">
            <?php echo htmlspecialchars($category['nom']); ?>
        </a>
    <?php endforeach; ?>
</nav>

<div id="contenedor-productos">
    <p style="text-align: center; color: #999; font-size: 0.9rem; letter-spacing: 1px; margin-top: 50px;">
        SELECT A COLLECTION TO VIEW
    </p>
</div>

<script>
function cargarProductos(idCategoria) {
    const contenedor = document.getElementById('contenedor-productos');
    contenedor.innerHTML = '<p style="text-align:center; margin-top:50px;">LOADING...</p>';

    // Efecte visual: marquem la categoria activa
    document.querySelectorAll('.category-link').forEach(el => el.style.color = '#888');
    event.target.style.color = '#000';

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
        .catch(err => console.error(err));
}


function cargarDetalle(idProducto) {
    const contenedor = document.getElementById('contenedor-productos');
    
    // Feedback visual
    contenedor.innerHTML = '<p style="text-align:center; margin-top:50px;">LOADING DETAILS...</p>';

    // Llamada Fetch al endpoint que creaste antes
    fetch('index.php?action=detall_producte_json&id=' + idProducto)
        .then(response => response.json())
        .then(producto => {
            if (producto.error) {
                contenedor.innerHTML = '<p style="text-align:center;">PRODUCT NOT FOUND.</p>';
                return;
            }

            // Renderizamos el detalle con estilo SINGH
            // Asegúrate de que las propiedades (nom, imatge, descripcio) coinciden con tu BBDD
            const html = `
                <div class="detalle-producto" style="display: flex; gap: 40px; max-width: 1000px; margin: 40px auto; align-items: start;">
                    
                    <div style="flex: 1;">
                        <img src="${producto.imatge}" alt="${producto.nom}" style="width: 100%; object-fit: cover;">
                    </div>

                    <div style="flex: 1; padding-top: 20px;">
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
        .catch(error => console.error('Error:', error));
}
</script>