<?php


include("../model/user_db.php");
include("../model/order_db.php");
include("../model/product_db.php");
$userInfo = new user_db();
$orderDB = new order_db();
$productDB = new product_db();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_user';
    }
}  


switch($action)
{
    case 'show_user':
        $datas = $userInfo->getAll();
        include('../admin/admin_userview.php');
        break;
    case 'show_order':
        $order = $orderDB->getAll();
        include('../admin/order_view.php');
        break;
    case 'show_detail':
        $order_id = filter_input(INPUT_POST, 'id');
        $itemId = $orderDB->getItem($order_id);
        $products = [];
        $quantity = [];
        foreach($itemId as $i)
        {
            $product = $productDB->getProduct($i['product_id']);
            $products[] = $product;
            $quantity[] = $i['quantity'];
        }
        include("../admin/detail_view.php");
        break;
        
}

