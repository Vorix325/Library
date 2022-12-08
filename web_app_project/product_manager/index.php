<?php 
require('../model/category.db.php');
require('../model/database.php');
require('../model/product.db.php');

$action = filter_input(INPUT_POST,'action');
if($action == NULL){
    $action = filter_input(INPUT_GET,'action');
    if($action == NULL || $action == FALSE){
        $action = 'list_products';
    }
}

switch($action){
    
}




if($action = "list_products"){
    $category_id = filter_input(INPUT_GET,'category_id');
    if($category_id == NULL || $category_id == FALSE){
        $category_id = 1;
    }
    $categories = get_categories();
    $category_name =  get_category_name($category_id);
    $products = get_product_by_category($category_id);
    include('product_list.php');
}
else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id');
    $category_id = filter_input(INPUT_POST, 'category_id');
    if ($category_id == NULL || $category_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
    } else { 
        delete_product($product_id);
        header("Location: .?category_id=$category_id");
    }
}



/*
else if ($action == 'show_update_product') {
    $product_id = filter_input(INPUT_GET, 'product_id', 
            FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $categories = get_categories();
        $product = get_product($product_id);
        $category_id = $product['category_id'];
        $name = $product['product_name'];
        $price = $product['price'];
        include('update.php');
    } 
}

else if ($action == 'update_the_form') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
    FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price',);
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        update_the_form($product_id,$category_id,$name, $price);
        header("Location: .?category_id=$category_id");
        include('update.php');
    }



}
*/
else if ($action == 'test') {
    //$categories = get_categories();
    include('product_add.php');    
}
else if ($action == 'add_product') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_product($category_id,$name, $price);
        header("Location: .?category_id=$category_id");
    }


}



?>