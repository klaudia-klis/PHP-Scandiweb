<?php

class Book extends Product 
{
  public $weight;
  
  public function __construct() 
  {
    $this->sku = isset($_POST['sku']) ? $_POST['sku'] : null;
    $this->name = isset($_POST['name']) ? $_POST['name'] : null;
    $this->price = isset($_POST['price']) ? $_POST['price'] : null;
    $this->type = isset($_POST['productType']) ? $_POST['productType'] : null;
    $this->weight = isset($_POST['weight']) ? $_POST['weight'] : null;
  }
  
  public function insertBookData() 
  {
    $conn = new Connection();
    $sql = $conn->connect();
    $stmt = $sql->prepare("INSERT INTO products (sku, name, price, type, weight) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $this->sku, $this->name, $this->price, $this->type, $this->weight);
    
    $stmt->execute();
    
    header('Location: index.php', true, 303); exit;
  }
}

?>