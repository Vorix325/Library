<?php
require("../model/user.php");
class user_db
{
    function checkLogin($username)
 {
    $db = database::getDB();
    $query = 'SELECT password FROM user_info
              WHERE user_name = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $password = $statement->fetch();
    $statement->closeCursor();
    return $password; 
 }
 function updateCurrent($userId, $type)
 {
    $db = database::getDB();
    $query = 'UPDATE currentQ SET user_id = :userId, typeof_user = :type WHERE queue = 1';   
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->bindValue(':type',$type);
    $statement->execute();
    $statement->closeCursor();
 }
 
 function getCurrent()
 {
    $db = database::getDB();
    $sql = "SELECT user_id FROM currentq WHERE queue = 1;";  
    $statement = $db->prepare($sql);
    $statement->execute();
    $userId = $statement->fetch();
    $statement->closeCursor();
    return $userId;
 }
 function getCurrentType()
 {
    $db = database::getDB();
    $sql = "SELECT typeof_user FROM currentq WHERE queue = 1;";  
    $statement = $db->prepare($sql);
    $statement->execute();
    $userId = $statement->fetch();
    $statement->closeCursor();
    return $userId;
 }
 
 function getUserInfo($userID)
  {
    $db = database::getDB();
    $query = 'SELECT * FROM user_info
              WHERE user_id = :userid'
 
              ;
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$userID);
    $statement->execute();
    $datas = $statement->fetchAll();
    $user = new User();
    if($datas == null)
    {
            $error = "Please select 2 exactly product for compare";
            header('Location: http://localhost/ex_starts/BudgetBuddy/BudgetBuddy/errors/error.php');
            
    }
     else 
    {
      
     foreach($datas as $data)
     {
      $user->setID($data['user_id']);
      $user->setFname($data['first_name']);
      $user->setLname($data['last_name']);
      $user->setUser($data['user_name']);
      $user->setPhone($data['phone_number']);
      $user->setEmail($data['email']);
      $user->setType($data['typeof_user']);
      $user->setPass($data['password']);
     }
     
    }
   
        
    $statement->closeCursor();
    return $user; 
  }
}

