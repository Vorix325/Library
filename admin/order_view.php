
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
								<th>Order Id</th>
                                                                <th>User Id</th>
								<th>Price</th>
                                                                <th>Date</th>
                                                                <th>Details</th>
                                                               
								
							</tr>
							
                                                            <?php foreach($order as $o) : ?>
                                                              <tr>
                                                                  <td><?php echo $o->getOrder(); ?></td>
                                                                  <td><?php echo $o->getUser(); ?></td>
                                                                  <td><?php echo $o->getPrice(); ?></td>
                                                                  <td><?php echo $o->getTime(); ?></td>
                                                                  <td></td>
                                                               </tr>
						            <?php endforeach; ?>
							
              
						</table>
						<br>
						
        </div>
        
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
  




