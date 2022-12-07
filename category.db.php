<?php 
function get_categories(){
    global $db;
    $query = 'SELECT * FROM category
            ORDER BY category_id';
    
    $stm = $db->prepare($query);
    $stm->execute();
    $categories = $stm->fetchAll();
    return $categories;
}

function get_category_name($category_id){
    global $db;
    $query = 'SELECT * FROM category
            WHERE category_id = :category_id';

        $stm = $db->prepare($query);
        $stm->bindValue(':category_id', $category_id);
        $stm->execute();
        $category = $stm->fetch();
        $category_name = $category['category_name'];
        $stm->closeCursor();
        return $category_name;
        include('../error/error.php');
}