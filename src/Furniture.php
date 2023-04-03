<?php

class Furniture extends Product 
{
  public $height;
  public $width;
  public $length;
  
  public function __construct() 
  {
    $this->sku = isset($_POST['sku']) ? $_POST['sku'] : null;
    $this->name = isset($_POST['name']) ? $_POST['name'] : null;
    $this->price = isset($_POST['price']) ? $_POST['price'] : null;
    $this->type = isset($_POST['productType']) ? $_POST['productType'] : null;
    $this->height = isset($_POST['height']) ? $_POST['height'] : null;
    $this->width = isset($_POST['width']) ? $_POST['width'] : null;
    $this->length = isset($_POST['length']) ? $_POST['length'] : null;
  }
  
  public function insertFurnitureData() 
  {
    $conn = new Connection();
    $sql = $conn->connect();
    $stmt = $sql->prepare("INSERT INTO products (sku, name, price, type, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $this->sku, $this->name, $this->price, $this->type, $this->height, $this->width, $this->length);
    
    $stmt->execute();
    
    header('Location: index.php', true, 303); exit;
  }
}

?>