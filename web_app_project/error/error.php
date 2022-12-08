<h1>test</h1>
<ul>
    <?php foreach($categories as $category):?>
        <li>
            <a href="?category_id=<?php echo $category['category_id'];?>"> 
            <?php echo $category['category_name']; ?></a>
        </li>
        <?php endforeach; ?>
</ul>

<section>
    <h1><?php echo $category_name; ?></h1>
</section>
</main>
