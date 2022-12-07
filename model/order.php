<?php
class order
{
    private int $orderId;
    private int $userId;
    private float $price;
    private DateTime $time;
    
    
     public function __construct() 
     {
        $this->orderId = 0;
        $this->userId = 0;
        $this->price = 0;
        $this->time = new DateTime();
        
      
    }
    
    public function getOrder() 
    {
        return $this->orderId;
    }

    public function setOrder(int $orderId) 
    {
        $this->orderId = $orderId;
    }
    
    public function getUser() 
    {
        return $this->userId;
    }

    public function setUser(int $userId) 
    {
        $this->userId = $userId;
    }
    
    public function getPrice() 
    {
        return $this->price;
    }

    public function setPrice(float $price) 
    {
        $this->price= $price;
    }
    
    public function getTime() 
    {
        return $this->time;
    }

    public function setTime(DateTime $time) 
    {
        $this->time = $time;
    }
    
}

