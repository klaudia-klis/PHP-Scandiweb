<?php

class DVD extends Product 
{
  public $size;
  
  // Using constructor to initialize object's properties.
  public function __construct() 
  {
    $this->sku = isset($_POST['sku']) ? $_POST['sku'] : null;
    $this->name = isset($_POST['name']) ? $_POST['name'] : null;
    $this->price = isset($_POST['price']) ? $_POST['price'] : null;
    $this->type = isset($_POST['productType']) ? $_POST['productType'] : null;
    $this->size = isset($_POST['size']) ? $_POST['size'] : null;
  }
  
  public function insertDVDdata() 
  {
    // Using prepared statement to prevent SQL injections.
    $conn = new Connection();
    $sql = $conn->connect();
    $stmt = $sql->prepare("INSERT INTO products (sku, name, price, type, size) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $this->sku, $this->name, $this->price, $this->type, $this->size);
    
    $stmt->execute();
    
    // Using header function to prevent form resubmission.
    header('Location: index.php', true, 303); exit;
  }
}

?>