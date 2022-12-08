
        <?php include '../view/header.php'; ?>

        <div class="wrapper3">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome" id="welcome">
                    <h3>Manage Regular User</h3>
                </div>    

               
            <!-- Budget Cateogory List -->
            <div class="list">
                <h3>Order</h3>
                <div class="expense-list-container"
                     id="list">
                </div>
                <!-- Budget Category Table -->
						<table border="1" id="category-info" class="category-info" style="display: block; margin: 0 auto;">
							<tr>
								<th>Product Id</th>
                                                                <th>Product Name</th>
                                                                 <th>Image</th>
								<th>Price</th>
                                                                <th>Quantity</th>
                                                               
                                                               
								
							</tr>
							    <?php $s = 0; ?>
                                                            <?php foreach($products as $o) : ?>
                                                              <tr>
                                                                  
                                                                  <td><?php echo $o->getId(); ?></td>
                                                                  <td><?php echo $o->getName(); ?></td>
                                                                  <td></td>
                                                                  <td><?php echo $o->getPrice(); ?></td>
                                                                  <td><?php echo $quantity[$s]; ?></td>
                                                                  <?php $s++; ?>
                                                                  
                                                               </tr>
						            <?php endforeach; ?>
							
              
						</table>
						<br>
						
        </div>
        
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
  




