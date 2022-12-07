<?php
class cart
{
    function getCart()
    {
        $db = database::getDB();
        $query = 'SELECT * FROM CART';
            
        $statement = $db->prepare($query);
        $statement->execute();
        $datas = $statement->fetchAll();
        $statement->closeCursor();
        return $datas;
    }
    
    function addCart($userId, $item, $quan)
    {
        $db = database::getDB();
        $query = 'INSERT INTO CART
                (user_id,product_id,quantity)
               VALUES
                 (:id, :item, :quan)';
            
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$userId);
        $statement->bindValue(':product_id',$item);
        $statement->bindValue(':quan',$quan);
        $statement->execute();
        $statement->closeCursor();
    }
    
    function deleteCart()
    {
        $db = database::getDB();
        $query = 'DELETE * FROM CART';
            
        $statement = $db->prepare($query);
        $statement->execute();
        $statement->closeCursor();
       
    }
}

