<?php

include("../model/user_db.php");
include("../model/product_db.php");

$userInfo = new user_db();
$product_db = new product_db ();
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
        break;
    case 'addOrder':
        $time = new DateTime();
        $user = $userInfo->getCurrent();
        $user_id = $user[0];
        $price = filter_input(INPUT_POST, 'total');
        break;
}


