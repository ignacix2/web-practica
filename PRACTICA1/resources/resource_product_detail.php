<html lang="ca">
<head>
    <title>Producte-TDIW</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . 'css/example.css'; ?>">
</head>
<body>
    <?php require __DIR__ . '/../view/header.php'; ?>
    <div class="container">
        <?php require __DIR__.'/controller/category_list.php'; ?>
        <?php require __DIR__.'/controller/product_list.php'; ?>
    </div>
</body>
</html>