<html lang= "ca">
<head>
    <title>Llista de productes - TDIW</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . 'css/example.css'; ?>">
    </head>
<body>

<div class="container">
    <?php require __DIR__ . '/../view/header.php'; ?>
    <?php require __DIR__ . '/../controller/product_list.php'; ?>
</div>
</html>
    /*

        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['price']); ?> €</td>
                <td><?php echo htmlspecialchars($product['category_name']); ?></td>
                <td><a href="<?php echo BASE_URL . '/index.php?action=detalle_producte&id=' . $product['id']; ?>">Veure detalls</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table> 
    */
