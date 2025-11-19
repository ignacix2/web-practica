<html lang= "ca">
<head>
    <title>Llista de productes - TDIW</title>
    <link rel="stylesheet" href=<?php echo BASE_URL . '/view/resources/css/example.css'?>/>
    </head>
<body>

<div class = "container">
    <h1>HELLO WORlD</h1>
    <?php require __DIR__ . '/controller/category_list.php'; ?>
    <?php require __DIR__ . '/controller/product_list.php'; ?>
    </div>
</body>
</html>
    /*
    <!-- <table>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Preu</th>
            <th>Categoria</th>
            <th>Detalls</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?> €</td>
                <td><?php echo htmlspecialchars($product['category_name']); ?></td>
                <td><a href="<?php echo BASE_URL . '/index.php?action=detalle_producte&id=' . $product['id']; ?>">Veure detalls</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table> -->
    */
