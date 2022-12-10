<?php include '../view/header.php'; ?>
<main>
    <style>
        table, th, td 
        {
          border: 1px solid black;
        }   
    </style><!-- comment -->
    <aside>
        <h1>Categories</h1>
        <nav>
       <div class="about-container">
         <ul>
          <?php foreach($categories as $category): ?>
          <li>
            
            <a href="?category_id=<?php echo $category['category_id'];?>">
                    <?php echo $category['category_name']; ?></a>
        
             
                
        </li>
       <?php endforeach; ?>
    </ul>
       </div>
        </nav>
    </aside>
    <section>
       
        <nav>
           <div class="about-container">
            <table>
                <tr>
                 <th>Product Image</th>
                 <th>Product Name</th>
                 <th>Price</th>
                </tr><!-- comment -->
                <?php foreach ($products as $product) : ?>
                <tr>
                    <td></td>
                    <td>
                         <a href="?action=view_product&amp;product_id=<?php
                          echo $product['product_id']; ?>">
                    <?php echo $product['product_name']; ?>
                         </a>
                    </td>
                    <td>
                         <?php echo $product['price'] ;?>
                    </td>
                          
                </tr><!-- comment -->
                
                <?php endforeach; ?>
            </table>
            
                         
                          
           </div>
       
        </nav>
    </section>
</main>
<?php include '../view/footer.php'; ?>