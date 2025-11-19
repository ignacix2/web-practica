<h2>Llistat de categories</h2>

<div class="row">
    <ul style="list-style: none; display: flex; gap: 20px;">
        <?php foreach ($categories as $category): ?>
            <li class="col">
                <a href="#" 
                   class="btn-categoria"
                   onclick="cargarProductos(<?php echo $category['id']; ?>); return false;">
                    <?php echo htmlspecialchars($category['nom']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<hr>

<div id="contenedor-productos">
    <p>Selecciona una categoria per veure els productes.</p>
</div>

<script>
function cargarProductos(idCategoria) {
    // 1. Referencia al contenedor
    const contenedor = document.getElementById('contenedor-productos');
    contenedor.innerHTML = '<p>Carregant productes...</p>'; // Feedback visual

    // 2. Llamada FETCH al servidor (Paso 1 que hemos creado)
    fetch('index.php?action=productes_json&category_id=' + idCategoria)
        .then(response => response.json()) // Convertimos la respuesta a JSON
        .then(productos => {
            
            // 3. Limpiamos el contenedor
            contenedor.innerHTML = '';

            if (productos.length === 0) {
                contenedor.innerHTML = '<p>No hi ha productes en aquesta categoria.</p>';
                return;
            }

            // 4. Creamos el HTML para cada producto
            let html = '<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">';
            
            productos.forEach(producto => {
                html += `
                    <div class="producto-card" style="border: 1px solid #ccc; padding: 10px;">
                        <img src="${producto.imatge}" alt="${producto.nom}" style="width: 100px; height: 100px; object-fit: cover;">
                        
                        <h3>${producto.nom}</h3>
                        <p>${producto.preu} €</p>
                        
                        <button onclick="alert('Aquí iría el detalle del producto ' + ${producto.id})">
                            Veure Detalls
                        </button>
                    </div>
                `;
            });

            html += '</div>';
            
            // 5. Inyectamos el HTML en la página
            contenedor.innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            contenedor.innerHTML = '<p style="color:red">Error al carregar productes.</p>';
        });
}
</script>