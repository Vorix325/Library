<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="." method="post" id="add_product_form">
        <input type="hidden" name="action" value="addCategory">
         <div class="category-container">
        <label>Category:</label>
        <br>

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Category" />
        <br>
    </form>
    <p class="last_paragraph">
        <a href="?action=list_products">View Product List</a>
    </p>
    </div>

</main>

