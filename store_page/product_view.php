<?php include '../view/header.php'; ?>


<main>
    <aside>
        <h1>Categories</h1>
        <nav>
        <ul>
    <?php foreach($categories as $category): ?>
        <li>
            <h5>
            <a href="?category_id=<?php echo $category['category_id'];?>">
                    <?php echo $category['category_name']; ?></a>
        
            </h5>

               
                
        </li>
        <?php endforeach; ?>
    </ul>
        </nav>
    </aside>
    <section>
        <div class="about-container">
        <h1><?php echo $product['product_name']; ?></h1>
        <div id="left_column">
            <p>
                
            </p>
        </div>
        <div id="right_column">
            <p><b>Price:</b> $<?php echo $product['price'] ?></p>
           
            <form action="<?php echo './index.php' ?>" method="post">
                <input type="hidden" name="action" value="addCart">
                <input type="hidden" name="productId"
                       value="<?php echo $product['product_id']; ?>">
                <input type='hidden' name='amount' value='1'>
                 <button type="submit" class="profile-submit">Purchase</button>
            </form>
        </div>
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>