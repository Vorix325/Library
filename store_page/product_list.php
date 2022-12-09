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
         <ul class="navigation">
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
        <h1><?php echo $current_category; ?></h1>
        <nav>
            <?php print_r($products);?>
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
            
                         
                          
                    
       
        </nav>
    </section>
</main>
<?php include '../view/footer.php'; ?>