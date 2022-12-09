<?php include '../view/header.php'; ?>
<main>
      <div class="category-container">
    <h1>Update</h1>
<form action="." method="post" id="add_product_form">
        <input type="hidden" name="action" value="update_the_form">
        
        <label>Category:</label>
        <select name="category_id">
        <?php  foreach ( $categories as $category ) : ?>
            <option value="<?php echo $category['category_id'];?>"> 
                <?php echo $category['category_name']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>
        

        <label>Name:</label>
        <input type="text" name="name" value = "<?php echo $name; ?>">
        <br>

        <label>Price:</label>
        <input type="text" name="price" value = "<?php echo $price ?>">
        <br>
        
        <input type="hidden" name="product_id" value= "<?php echo $product_id ?>">
        <br>


        <label>&nbsp;</label>
        <input type="submit" value="update Product" />
        <br>
        </div>
        </main>
        </form>