<?php

include("../model/user_db.php");

$userInfo = new user_db();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}  

switch($action)
{
    case 'addOrder':
        $time = new DateTime();
}


