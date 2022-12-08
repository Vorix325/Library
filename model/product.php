
<?php
class product
{
    private int $id;
    private String $name;
    private float $price;
    private int $ca_id;
    
    
     public function __construct() 
     {
        $this->id = 0;
        $this->name= '';
        $this->price = 0;
        $this->ca_id = 0;
    }
    
    public function getId() 
    {
        return $this->id;
    }

    public function setId(int $id) 
    {
        $this->id = $id;
    }
    
    public function getName() 
    {
        return $this->name;
    }

    public function setName(String $name) 
    {
        $this->name = $name;
    }
    
    public function getPrice() 
    {
        return $this->price;
    }

    public function setPrice(float $price) 
    {
        $this->price= $price;
    }
    
    public function getCaId() 
    {
        return $this->ca_id;
    }

    public function setCaId(int $ca_id) 
    {
        $this->ca_id = $ca_id;
    }
    public function getImageFilename() {
        $image_filename = $this->id . '.png';
        return $image_filename;
    }
}


