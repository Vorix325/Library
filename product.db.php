<?php
function get_products_by_category($category_id) {
    global $db;
    $query = 'SELECT * FROM product
              WHERE category_id = :category_id
              ORDER BY product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $products = $statement->fetchAll();
    $statement->closeCursor();
    return $products;
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT * FROM product
              WHERE product_id = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":product_id", $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
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


/*

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
*/
?>