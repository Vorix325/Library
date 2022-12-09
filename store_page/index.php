<?php
require("../model/database.php");
include("../model/user_db.php");
include("../model/product_db.php");
include('../model/cart.php');
include('../model/order_db.php');
$userInfo = new user_db();
$product_db = new product_db ();
$order_db = new order_db();
$carts = new cart();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}  

switch($action)
{
    case 'show_cart':
        $cart = $carts->getCart();
        include('../store_page/cart.php');
        break;
    case 'addCart':
        $userId = filter_input(INPUT_POST, 'userId');
        $item = filter_input(INPUT_POST, 'productId');
        $quan = $carts->getQuantity($userId, $productId);
        $amount = filter_input(INPUT_POST, 'amount');
        changeCart($userId, $item, $quan, $amount, $carts);
        header('Location:.?action=show_cart');
        break;
        
    case 'addOrder':
        $date = new DateTime();
        $user = $userInfo->getCurrent();
        $user_id = $user[0];
        $price = filter_input(INPUT_POST, 'total');
        $order_db->addOrder($user_id, $price, $date);
        $order = $order_db->getOrder($user_id, $date);
        $all = $cart->getCart();
        
        foreach($all as $c)
        {
            $order_db->addItem($order[0], $c['product_id']);
        }
        
        $cart->deleteCart();
        
        break;
    
        
}


function changeCart($userId,$item,$quan,$amount,$carts)
{
    if($quan == null)
        {
            $quant = 1;
            $carts->addCart($userId, $item, $quan);
        }
        else 
        {
            $quant = $quan[0];
            $quan += $amount;
            $carts->updateCart($userId, $item, $quan);
        }
}


