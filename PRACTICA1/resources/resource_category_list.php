<html lang="ca">
<head>
    <title>Llista de categories-TDIW</title>
    <link rel="stylesheet" href="<?php echo BASE_URL. '/view/resources/css/example.css' ?>"/>
</head>
<body>
    <?php require __DIR__ . '/../view/header.php'; ?>
    <div class="container">
        <a href="index.php?action=productes">Soc un enllaç </a>
        <?php require __DIR__ . '/../controller/category_list.php'; ?>
    </div>
</body>
</html>