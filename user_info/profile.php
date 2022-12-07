
        <!-- Header -->
        <?php include '../view/header.php'; ?>
        
        <div class="wrapper">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome">
                    <h3>Welcome to your profile! Check to see if we got the details right.</h3>
                </div>
                <div class="info-container">
                    <h3>Your Profile</h3>
                    <table border="1" id="user-info" class="user-info" style="display: block; margin: 0 auto;">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            
                            <th>Modify</th>
                        </tr>
                        <tr>
                            <td><?php echo $info->getFname()." ". $info->getLname(); ?></td>
                            <td><?php echo $info->getEmail(); ?></td>
                            <td><?php echo $info->getPhone(); ?></td>
                           
                            <td><button class="user-edit"><i class="fas fa-user-edit" id="user-edit"></i></button></td>
                        </tr>
                    </table>
                    <br>
                    <form action='./index.php' method='post'>
                    <button type=button class="profile-submit">Update</button>
                    
                    </form>
                </div>
            </div>
        </div>
        <br>

        <!-- Footer -->
        <?php include '../view/footer.php'; ?>


