<?php include '../view/header.php'; ?>
<main>
  
    <section>
        
        <table border="1">
            <tr>
                <th>Product Name</th><!-- comment -->
                <th>Product Image</th>   
                <th>Quantity</th>
                <th>Price</th><!-- comment -->
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
                <td><?php $total = $price*$item['quantity']; 
                          $totalS += $total; 
                     ?></td>
        
                </form></td>
            </tr><!-- comment -->
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php echo $totalS; ?></td>
            </tr>
        </table>
    </section>
</main>


