<?php
require("../model/database.php");
include("../model/user_db.php");
include("../model/product_db.php");
require('../model/cart.php');
include('../model/order_db.php');
require('../model/category_db.php');

$categoryDB = new categoryDB();
$productDB = new product_db();
$userInfo = new user_db();

$order_db = new order_db();
$carts = new cart();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  

switch($action)
{
    case 'list_products':
        $category_id = filter_input(INPUT_GET, 'category_id', 
                FILTER_VALIDATE_INT);
        if ($category_id == NULL || $category_id == FALSE) {
            $category_id = 1;
        }

        $current_category = $categoryDB->get_category_name($category_id);
        $categories = $categoryDB->get_categories();
        $products = $productDB->get_product_by_category($category_id);

        include('product_list.php');
        break;
    case 'view_product':
        $categories = $categoryDB->get_categories();

        $product_id = filter_input(INPUT_GET, 'product_id', 
                FILTER_VALIDATE_INT);   
        $product = $productDB->get_product($product_id);

        include('product_view.php');
        break;
    case 'show_cart':
        $cart = $carts->getCart();
        include('../store_page/cart.php');
        break;
    case 'addCart':
        $userId = $userInfo->getCurrent();
        $item = filter_input(INPUT_POST, 'productId');
        $quan = $carts->getQuantity($userId[0], $item);
        $amount = filter_input(INPUT_POST, 'amount');
        
        if($quan == null)
        {
            $quant = 1;
            $carts->addCart($userId[0], $item, $quant);
        }
        else 
        {
            $quant = $quan[0];
            $quant += $amount;
            $carts->updateCart($userId[0], $item, $quant);
        }
        header('Location:.?action=show_cart');
        break;
        
    case 'addOrder':
        date_default_timezone_set('America/New_York');
        $date = date("Y-m-d h:i:sa");
        $user = $userInfo->getCurrent();
        $user_id = $user[0];
        $price = filter_input(INPUT_POST, 'total');
        $order_db->addOrder($user_id, $price, $date);
        $order = $order_db->getOrder($user_id,$date);
        $all = $carts->getCart();
        
        
        foreach($all as $c)
        {
            $order_db->addItem($order[0], $c['product_id'], $c['quantity']);
        }
        
        $carts->deleteCart();
        header('Location:../index.php');
        break;
    
        
}





