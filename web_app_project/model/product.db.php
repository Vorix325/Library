<?php 
function get_product_by_category($category_id){
    global $db;
    $query = 'SELECT * from product 
            WHERE category_id =:category_id
            ORDER BY product_id';

    $stm = $db->prepare($query);
    $stm->bindValue(':category_id', $category_id);
    $stm->execute();
    $products = $stm->fetchAll();
    $stm->closeCursor();
    return $products;
}
function get_product($product_id){
    global $db;
    $query = 'SELECT * FROM product
                WHERE product_id = :product_id';
    
    $stm=$db->prepare($query);
    $stm->bindValue(':product_id', $product_id);
    $stm->execute();
    $product = $stm->fetch();
    $stm->closeCursor();
    return $product;
}
function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM product
              WHERE product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}




function update_the_form($product_id,$category_id, $name, $price) {
    global $db;
    $query = "UPDATE product
              SET category_id= :category_id,
                  product_name=:name,
                  price=:price 
              WHERE product_id = $product_id";
   $statement = $db->prepare($query);     
   $statement->bindValue(':category_id', $category_id);
   $statement->bindValue(':name', $name);
   $statement->bindValue(':price', $price);
   $statement->execute();
   $statement->closeCursor();
}


function add_product($category_id, $name, $price) {
    global $db;
    $query = 'INSERT INTO product
                 (category_id,product_name,price)
              VALUES
                 (:category_id, :name, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

?>