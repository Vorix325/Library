<?php 
   $dsn = 'mysql:host=localhost;dbname=bookmark';
   $username = 'mgs_user';
   $password = 'pa55word';
   $options = array(PDO::ATTR_ERRMODE =>
   PDO::ERRMODE_EXCEPTION);
 try 
 {
   $db1 = new PDO($dsn, $username, $password, $options);
 } 
 catch (PDOException $e) 
 {
      exit;
 }
 
    
    $sql = "SELECT typeof_user FROM currents WHERE queue = 1;";  
    $statement = $db1->prepare($sql);
    $statement->execute();
    $types = $statement->fetch();
    $statement->closeCursor();
    $type = $types[0];
 ?>
<!DOCTYPE html>
<html>
<head>
   
     <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
            rel="stylesheet"
        />
        <!-- Stylesheet -->
        <link rel="stylesheet" href="../bp-stylesheet.css" >
</head>   
<body>
         <div class="header">
            <div class="inner-header">
                <div class="logo-container">
                    <h1><span>Library</span></h1>
                </div>
                <ul class="navigation">
                    <a href='/Library-main/index.php'><li>Home</li></a>
                     <?php if($type == null) : ?>
                    <a href= '/Library-main/user_info/index.php?action=show_login'><li>Login</li></a>
                    <a href= '/Library-main/user_info/index.php?action=show_reg'><li>Register</li></a>
                    <?php endif; ?>
                     <?php 
                    if($type != null) : ?>
                    <a href= '/Library-main/user_info/index.php?action=show_pro'><li>Profile</li></a>
                   <a href= '/Library-main/store_page/index.php?action=show_cart'><li>Cart</li></a>
                    <?php endif; ?>
                    <?php
                     if($type == "super") : ?>
                   <a href= '/Library-main/admin/index.php?action=show_user'><li>Show All user</li></a>
                   <a href= '/Library-main/admin/index.php?action=show_order'><li>Show All Order</li></a>
                     <?php endif; ?>
                </ul>
            </div>
         </div>

