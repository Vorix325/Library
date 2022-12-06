<?php include("../view/header.php"); ?>

        <div class="wrapper">
            <div class="container">
                <!-- Welcome -->
                <div class="welcome">
                    <h3>Welcome to Budget Buddy! Let's get started on that budget</h3>
                    <p><?php print_r($as); ?></P>
                   
                </div>
            </div>
             
            <!-- Login -->      
            <div class="login-container">
               <form action="index.php" method='post'>
                <input type="hidden" name='action' value='login'>
                <label>Username : </label>   
                <input type="text" placeholder="Enter Username" name="username" required/>  
                <label>Password : </label>   
                <input type="password" placeholder="Enter Password" name="password" required/>  
                <button class="submit">Login</button> 
               </form> 
                &nbsp;
                <Br><input type="checkbox" checked="checked" class="checkbox"> Remember me  
                &nbsp;
                 <br><a href="#"> Forgot password? </a> 
                &nbsp; <br> <br>
                <form action="index.php" method='post'>
                <input type="hidden" name='action' value='show_reg'>
                  <p>Are you a new Buddy?</p>
                  <button class="submit">Create New Account</button>  
                </form>
            </div>   
        </div>
        
        <!-- Footer -->
<?php include '../view/footer.php'; ?>
          
            
  
