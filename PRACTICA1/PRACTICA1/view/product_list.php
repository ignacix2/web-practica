<div class = "container">

<h1><?php echo $title; ?></h1>
<div class = "row">
    <ul>
        <?php foreach ($products as $product): ?>
           <li class="col"> <a href="/index.php?action=detalle_producte&product_id=<?php echo $product['id']?>">
                <?php echo htmlspecialchars($product['nom']) ?> - <?php echo htmlspecialchars($product['preu']) ?> €</a>
              </li>
            <?php endforeach; ?>
        </ul>   
        </div>
</div>