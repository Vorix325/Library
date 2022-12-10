<?php 
require('../model/category_db.php');
require("../model/database.php");
require('../model/product_db.php');


$categoryDB = new categoryDB();
$productDB = new product_db();
$action = filter_input(INPUT_POST,'action');
if($action == NULL){
    $action = filter_input(INPUT_GET,'action');
    if($action == NULL || $action == FALSE){
        $action = 'list_products';
    }
}

switch($action)
{
    case 'list_products':
     $category_id = filter_input(INPUT_GET,'category_id');
     if($category_id == NULL || $category_id == FALSE){
        $category_id = 1;
     }
     $categories = $categoryDB->get_categories();
     $category_name =  $categoryDB->get_category_name($category_id);
     $products = $productDB->get_product_by_category($category_id);
     include('../store_manager/product_list.php');
     break;
    case 'delete_product':
      $product_id = filter_input(INPUT_POST, 'product_id');
      $category_id = filter_input(INPUT_POST, 'category_id');
      if ($category_id == NULL || $category_id == FALSE ||
            $product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id or category id.";
        include('../errors/error.php');
      } else { 
        $productDB->delete_product($product_id);
        header("Location: .?category_id=$category_id");
      }
      break;
    case 'test':
       $categories = $categoryDB->get_categories();
       include('product_add.php');    
       break;
    case 'add_product':
        $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
         $name = filter_input(INPUT_POST, 'name');
         $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
         if ($category_id == NULL || $category_id == FALSE || 
            $name == NULL || $price == NULL || $price == FALSE) {
         $error = "Invalid product data. Check all fields and try again.";
         include('../errors/error.php');
        } else { 
           $productDB->add_product($category_id,$name, $price);
           header("Location: .?category_id=$category_id");
        }
        break;
    case 'show_update_product':
         $product_id = filter_input(INPUT_GET, 'product_id', 
            FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else {
        $categories = $categoryDB->get_categories();
        $product = $productDB->get_product($product_id);
        $category_id = $product['category_id'];
        $name = $product['product_name'];
        $price = $product['price'];
        include('../store_manager/update.php');
    } 
    break;
    case 'update_the_form':       
     $product_id = filter_input(INPUT_POST, 'product_id', 
    FILTER_VALIDATE_INT);
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $price = filter_input(INPUT_POST, 'price',);
    if ($category_id == NULL || $category_id == FALSE  || 
            $name == NULL || $price == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        $productDB->update_the_form($product_id,$category_id,$name, $price);
        header("Location: .?category_id=$category_id");
        include('../store_manager/update.php');
    }
    break;
    case 'showCat':
        include '../store_manager/addCategory.php';
        break;
    case 'addCategory':
    $name = filter_input(INPUT_POST, 'name');
    $categoryDB->add_category($name);
    header("Location: .index.php");
    break;
}







