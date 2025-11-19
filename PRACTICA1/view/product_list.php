<div class = "container">

<h1><?php echo $title; ?></h1>
<div class = "row">
    <ul>
        <?php foreach ($products as $product): ?>
           <li class = col>

            <a href="/index.php?action=detalle_producte&product_id=<?php echo $product['id']?>">
                <?php echo $product['title'] ?>-<?php echo $product['author'] ?>
              </a>
              </li>
            <?php endforeach; ?>
        </ul>   
        </div>