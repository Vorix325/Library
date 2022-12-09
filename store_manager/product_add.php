<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="." method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">
         <div class="category-container">
        <label>Category:</label>
        <select name="category_id">
        <?php foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['category_id']; ?>">
                <?php echo $category['category_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>


        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Price:</label>
        <input type="text" name="price" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="?action=list_products">View Product List</a>
    </p>
    </div>

</main>