
        <?php include '../view/header.php'; ?>

        <div class="wrapper3">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome" id="welcome">
                    <h3>Manage Regular User</h3>
                </div>    

               
            <!-- Budget Cateogory List -->
            <div class="list">
                <h3>User List:</h3>
                <div class="expense-list-container"
                     id="list">
                </div>
                <!-- Budget Category Table -->
						<table border="1" id="category-info" class="category-info" style="display: block; margin: 0 auto;">
							<tr>
								<th>User Id</th>
                                                                <th>User name</th>
								<th>First Name</th>
                                                                <th>Last Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                         
                                                                <th>Password</th>
                                                                <th>Type</th>
								
								
							</tr>
							
                                                            <?php foreach($datas as $d) : ?>
                                                              <tr>
								<td><?php echo $d->getID() ;?></td>
                                                                <td><?php echo $d ->getUser(); ?></td>   
                                                                <td><?php echo $d ->getFname(); ?></td><!-- < -->
                                                                <td><?php echo $d ->getLname(); ?></td>
                                                                <td><?php echo $d ->getEmail(); ?></td>
                                                                <td><?php echo $d ->getPhone(); ?></td>
                                  
                                                                <td><?php echo $d ->getPass(); ?></td>
                                                                <td><?php echo $d ->getType(); ?></td>
                                                              
                                                                    </tr>
						            <?php endforeach; ?>
							
              
						</table>
						<br>
						
        </div>
        
        <!-- Footer -->
        <?php include '../view/footer.php'; ?>
  


