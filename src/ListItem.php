<?php 

class ListItem 
{
  public $id;
  public $sku;
  public $name;
  public $price;
  public $description;
  
  public function __construct($id, $sku, $name, $price, $description) 
  {
    $this->id = $id;
    $this->sku = $sku;
    $this->name = $name;
    $this->price = $price;
    $this->description = $description;
  } 
}

?>