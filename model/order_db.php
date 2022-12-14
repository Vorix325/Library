<?php

require("../model/order.php");


class order_db
{
    function addOrder($userId, $price, $date)
    {
         $db = database::getDB();
        $query = 'INSERT INTO ORDERID
                (user_id,price,orderDate)
               VALUES
                 (:id, :price,:time)';
            
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$userId);
        $statement->bindValue(':price',$price);
        $statement->bindValue(':time',$date);
        $statement->execute();
        $statement->closeCursor();
    }
    function getOrder($userId, $time)
    {
        $db = database::getDB();
        $query = 'SELECT order_id FROM ORDERID WHERE  user_id= :id AND orderDate = :time';
            
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$userId);
        $statement->bindValue(':time',$time);
        $statement->execute();
        $data = $statement->fetch();
        $statement->closeCursor();
        return $data;
    }
    function addItem($orderId,$item,$quan)
    {
         $db = database::getDB();
        $query = 'INSERT INTO ORDERS
                (order_id,product_id,quantity)
               VALUES
                 (:id, :item,:quan)';
            
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$orderId);
        $statement->bindValue(':item',$item);
        $statement->bindValue(':quan',$quan);
        $statement->execute();
        $statement->closeCursor();
    }
    function getItem($orderId)
    {
        $db = database::getDB();
        $query = 'SELECT * FROM ORDERID
                  WHERE order_id = :id';
            
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$orderId);
        $statement->execute();
        $orders = $statement->fetchAll();
        $statement->closeCursor();
        return $orders;
    }
    function getAll()
    {
        $db = database::getDB();
        $query = 'SELECT * FROM ORDERID';
            
        $statement = $db->prepare($query);
        $statement->execute();
        $datas = $statement->fetchAll();
        $orders = [];
        foreach($datas as $data)
        {
            $order = new order();
            $order->setOrder($data['order_id']);
            $order->setUser($data['user_id']);
            $order->setPrice($data['price']);
            $order->setTime($data['orderDate']);
            $orders[] = $order;
        }
        $statement->closeCursor();
        return $orders;
    }
}
