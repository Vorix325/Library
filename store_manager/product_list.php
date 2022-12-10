<?php include('../view/header.php');?>
    <main>
    <h1>Bookmarket</h1>

    
    <div class='list'>
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

    <section>
    <h1><?php echo $category_name; ?></h1>


    <table border = '1'>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
      
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['product_name'];?></td>
                <td><?php echo $product['price'];?></td>
                
    
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_product">
                    <input type="hidden" name="product_id"
                           value="<?php echo $product['product_id']; ?>">
                    <input type="hidden" name="category_id"
                           value="<?php echo $product['category_id']; ?>">
                           <button type="submit"  onclick="return confirm('Are you sure you want to delete this ?')" value="Delete">Delete</button>  
                           </form>   
                    <!--<input type="submit" value="Delete"> -->
                </td>
                <td><form action="." >
                    <input type="hidden" name="action"
                           value="show_update_product">

                    <input type="hidden" name="product_id"
                           value="<?php echo $product['product_id']; ?>">
                    <input type="hidden" name="category_id" 
                           value="<?php echo $product['category_id']; ?>">
                    <input type="hidden" name="name" 
                            value="<?php echo $product['product_name']; ?>">
                    <input type="hidden" name="price" 
                            value="<?php echo $product['price']; ?>">
                        
                    <input type="submit" value="Update">
                </form></td>
            </tr>

                
            <?php endforeach; ?>
        </table>

        
        
        <a href="index.php?action=test">Add Product</a>
        <a href="index.php?action=addCategory">Add Product</a>


        

    </section>
    </div>


</main>