
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
                            <th>UserName</th><!--  -->
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Modify</th>
                            
                            
                        </tr>
                        <tr>
                            <form action='./index.php' method='post'>
                             <input type = 'hidden' name='userId' value='<?php echo $info->getID(); ?>'>
                            <td><input type='text' name='userName' value='<?php echo $info->getUser(); ?>' readonly></td>
                            <td><input type='text' name='pass' value='<?php echo $info->getPass(); ?>' readonly></td>
                            <td><input type='text' name='fname' value='<?php echo $info->getFname(); ?>' readonly></td>
                            <td><input type='text' name='lname' value='<?php echo $info->getLname(); ?>' readonly></td>
                            <td><input type='text' name='email' value='<?php echo $info->getEmail(); ?>' readonly></td>
                            <td><input type='text' name='phone' value='<?php echo $info->getPhone(); ?>' readonly></td>
                
                        </tr>
                    </table>
                    <br>
                    
                    <input type='hidden' name='action' value='showEdit'>
                    <button type="submit" class="profile-submit">Update</button>
                    
                    </form>
                </div>
            </div>
        </div>
        <br>

        <!-- Footer -->
        <?php include '../view/footer.php'; ?>


