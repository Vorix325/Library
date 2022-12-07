<?php
require("../model/user.php");
require("../model/database.php");
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
     
    
   
        
    $statement->closeCursor();
    return $user; 
  }
  function getAll()
  {
    $db = database::getDB();
    $query = 'SELECT * FROM user_info
              '
 
              ;
    $statement = $db->prepare($query);
    $statement->execute();
    $datas = $statement->fetchAll();
    $users = [];
      
     foreach($datas as $data)
     {
      $user = new User();
      $user->setID($data['user_id']);
      $user->setFname($data['first_name']);
      $user->setLname($data['last_name']);
      $user->setUser($data['user_name']);
      $user->setPhone($data['phone_number']);
      $user->setEmail($data['email']);
      $user->setType($data['typeof_user']);
      $user->setPass($data['password']);
      $users[] = $user;
     }
     
    
   
        
    $statement->closeCursor();
    return $users; 
  }
  function addUser($username,$password,$fname,$lname,$email,$phone,$type)
  {
    
    $db = database::getDB();
    $query = 'INSERT INTO users_bbudget
                (user_name, first_name, last_name, email, phone_number, typeof_user, password)
               VALUES
                 (:username,:fname,     :lname,    :email, :phone, :type, :password)';
            
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password',$password);
    $statement->bindValue(':fname',$fname);
    $statement->bindValue(':lname',$lname);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':phone',$phone);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor(); 
  }
  function updateUser($id, $username,$password,$fname,$lname,$email,$phone, $type)
   {
    $db = database::getDB();
    $query = 'UPDATE users_bbudget
              SET 
              user_name = :username, first_name = :fname, last_name = :lname , email = :email, phone_number = :phone, typeof_user = :type, password = :password
              WHERE 
              user_id = :id'
               ;
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password',$password);
    $statement->bindValue(':fname',$fname);
    $statement->bindValue(':lname',$lname);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':phone',$phone);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
   }
}

