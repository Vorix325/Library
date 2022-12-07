<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Categories</h1>
        <nav>
        <ul>
            <!-- display links for all categories -->
            <?php foreach($categories as $category) : ?>
            <li>
                <a href="?category_id=<?php echo $category->getID(); ?>">
                    <?php echo $category->getName(); ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    <section>
        
        <table border="1">
            <tr>
                <th>Product Name</th><!-- comment -->
                <th>Product Image</th>   
                <th>Quantity</th>
                <th>Price</th><!-- comment -->
                <th>Total</th>
                <th>Add</th>
                <th>Remove</th>
            </tr>
            <?php $totalS = 0; ?>
            <?php foreach($cart as $item): ?>
            <tr>
                <td><?php 
                         $product = $proudct_db->getProduct($item['product_id']); 
                         echo $product->getName();
                    ?></td>
                <td></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php $price = $product->getPrice(); 
                          echo $price;                  
                     ?></td><!-- comment -->
                <td><?php $total = $price*$item['quantity']; 
                          $totalS += $total; 
                     ?></td>
                <td><form action ='./index.php' method='post'>
                        <input type ='hidden' name='action' value='addItem'><!-- comment -->
                        <input type='button' value='+'>
                </form></td>
                <td><form action ='./index.php' method='post'>
                        <input type ='hidden' name='action' value='deleteItem'><!-- comment -->
                        <input type='button' value='-'>
                </form></td>
            </tr><!-- comment -->
            <?php endforeach; ?>
        </table>
    </section>
</main>


