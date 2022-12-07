<?php
require("../model/product.php");
require("../model/database.php");

class product_db
{
    function getProduct($product_id)
    {
         $db = database::getDB();
         $query = 'SELECT * FROM product
              WHERE product_id = :id';
          $statement = $db->prepare($query);
          $statement->bindValue(':id',$product_id);
          $statement->execute();
          $products= $statement->fetch();
          $product = new product();
          foreach($products as $p)
        {
            $product->setId($p['product_id']);
            $product->setName($p['product_name']);
            $product->setCaId($p['category_id']);
            $product->setPrice($p['price']);
            
        }
           $statement->closeCursor();
           return $product; 
    }
    
    
    
}

