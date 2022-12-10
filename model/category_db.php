<?php 

class categoryDB
{

 function get_categories()
 {
    $db = database::getDB();
    $query = 'SELECT * FROM category
            ORDER BY category_id';
    
    $stm = $db->prepare($query);
    $stm->execute();
    $categories = $stm->fetchAll();
    return $categories;
 }

 function get_category_name($category_id)
 {
    $db = database::getDB();
    $query = 'SELECT * FROM category
              WHERE category_id = :category_id';

        $stm = $db->prepare($query);
        $stm->bindValue(':category_id', $category_id);
        $stm->execute();
        $category = $stm->fetch();
        $category_name = $category['category_name'];
        $stm->closeCursor();
        return $category_name;
        
 } 
 
 function add_category($name)
 {
     $db = database::getDB();
    $query = 'INSERT INTO category
              (category_name)
              VALUES
              (:name)'
              ;

        $stm = $db->prepare($query);
        $stm->bindValue(':name', $name);
        $stm->execute();
        $stm->closeCursor();
       
 }

}