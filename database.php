<?php 
$dsn = 'mysql:host=localhost;dbname=bookmark';
$username = 'root';
$password = '';

try{
    $db = new PDO($dsn,$username,$password);
}catch(PDOException $e){
    $error_message = $e->getMessage();
}
?>