
<main>
    <h1>Bookmarket</h1>
    <?php foreach($categories as $category): ?>
        <li>
            <a href="?category_id=<?php echo $category['category_id']; ?>">
            <?php $category['product_name'];?></a>
        </li>
        <?php endforeach; ?>
</main>