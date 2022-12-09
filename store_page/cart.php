<?php include '../view/header.php'; ?>
<main>
  
    <section>
        <div class="info-container">
        <table border="1" id="user-info" class="user-info" style="display: block; margin: 0 auto;">
            <tr>
                <th>Product Name</th><!-- comment -->
                <th>Product Image</th>   
                <th>Quantity</th>
                <th>Price</th><!-- comment -->
                <th>Add</th><!-- comment -->
                <th>Delete</th>
                <th>Total</th>
                
            </tr>
            <?php $totalS = 0; ?>
            <?php foreach($cart as $item): ?>
            <tr>
                <td><?php 
                         $product = $proudct_db->getProduct($item['product_id']); 
                         echo $product->getName();
                    ?></td>
                <td><?php $item->getImageFilename(); ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php $price = $product->getPrice(); 
                          echo $price;                  
                     ?></td><!-- comment -->
                <td><form action="./index.php" method="post">
                      <input type='hidden' name='userId' value='<?php echo $item['user_id'];?>'>
                      <input type='hidden' name='productId' value='<?php echo $item['product_id'];?>'><!-- comment -->
                      <input type='hidden' name='amount' value='1'><!-- comment -->
                      <input type ='hidden' name='action' value='addCart'>
                      <input type='submit' value='+'>
                 </form></td>
                <td><form action="./index.php" method="post">
                      <input type='hidden' name='userId' value='<?php echo $item['user_id'];?>'>
                      <input type='hidden' name='productId' value='<?php echo $item['product_id'];?>'><!-- comment -->
                      <input type='hidden' name='amount' value='-1'><!-- comment -->
                      <input type ='hidden' name='action' value='addCart'>
                      <input type='submit' value='-'>
                 </form></td>
                <td><?php $total = $price*$item['quantity']; 
                          $totalS += $total; 
                     ?></td>
        
                
            </tr><!-- comment -->
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $totalS; ?></td>
            </tr>
        </table>
        </div>
    </section>
</main>


