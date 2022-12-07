<?php 
require('../model/category_db.php');
//require('../model/product.db.php');

$action = filter_input(INPUT_POST,'action');
if($action == NULL){
    $action = filter_input(INPUT_GET,'action');
    if($action == NULL || $action == FALSE){
        $action = 'list_product_by_category';
    }
}

if($action == "list_product_by_category"){
    $category_id = filter_input(INPUT_GET,'category_id');
    if($category_id == NULL || $category_id == FALSE){
        $category_id=1;
    }
    $categories = get_categories();
    $category_name =  get_category_name($category_id);
    //$products = get_product_by_category($category_id);
    //include('product_list_page.php');
}





?>