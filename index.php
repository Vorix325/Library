
<!DOCTYPE html>   
<html>   
    <head>  
        <meta name="viewport" content="width=device-width, initial-scale=1"/>  
        <title> Home Page </title>  
    
        <!-- Google Font link -->
        <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap"
        rel="stylesheet" />

        <!-- Stylesheet -->
        <link rel="stylesheet" href="bp-stylesheet.css" />
    </head>    
    
        
<?php include 'view/header.php'; ?>
<main>
    <div class="about-container">
    <h1>Menu</h1>
    <ul>
         <?php if($type == 'super'): ?>
        <li>
            <a href="store_manager">Product Manager</a>
        </li>
       <?php endif; ?>
        <li>
            <a href="store_page">Product Catalog</a>
        </li>
        
    </ul>
    </div>
</main>
<?php include 'view/footer.php'; ?>
