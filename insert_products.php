<?php
 
  class Product {
    public $sku;
    public $name;
    public $price;
    public $type;
    
  }
  
  class DVD extends Product {
    public $size;
    
    // Using constructor to initialize object's properties.
    public function __construct() {
      $this->sku = isset($_POST['sku']) ? $_POST['sku'] : null;
      $this->name = isset($_POST['name']) ? $_POST['name'] : null;
      $this->price = isset($_POST['price']) ? $_POST['price'] : null;
      $this->type = isset($_POST['productType']) ? $_POST['productType'] : null;
      $this->size = isset($_POST['size']) ? $_POST['size'] : null;
    }
    
    public function insertDVDdata() {
      $conn = mysqli_connect('localhost', 'root', 'root', 'productsDB');
      
      // Using prepared statement to prevent SQL injections.
      $stmt = $conn->prepare("INSERT INTO products (sku, name, price, type, size) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param('sssss', $this->sku, $this->name, $this->price, $this->type, $this->size);
      
      $stmt->execute();
      
      // Using header function to prevent form resubmission.
      header('Location: index.php', true, 303); exit;
    }
  }
  
  class Furniture extends Product {
    public $height;
    public $width;
    public $length;
    
    public function __construct() {
      $this->sku = isset($_POST['sku']) ? $_POST['sku'] : null;
      $this->name = isset($_POST['name']) ? $_POST['name'] : null;
      $this->price = isset($_POST['price']) ? $_POST['price'] : null;
      $this->type = isset($_POST['productType']) ? $_POST['productType'] : null;
      $this->height = isset($_POST['height']) ? $_POST['height'] : null;
      $this->width = isset($_POST['width']) ? $_POST['width'] : null;
      $this->length = isset($_POST['length']) ? $_POST['length'] : null;
    }
    
    public function insertFurnitureData() {
      $conn = mysqli_connect('localhost', 'root', 'root', 'productsDB');
      $stmt = $conn->prepare("INSERT INTO products (sku, name, price, type, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param('sssssss', $this->sku, $this->name, $this->price, $this->type, $this->height, $this->width, $this->length);
      
      $stmt->execute();
      
      header('Location: index.php', true, 303); exit;
    }
  }
  
  class Book extends Product {
    public $weight;
    
    public function __construct() {
      $this->sku = isset($_POST['sku']) ? $_POST['sku'] : null;
      $this->name = isset($_POST['name']) ? $_POST['name'] : null;
      $this->price = isset($_POST['price']) ? $_POST['price'] : null;
      $this->type = isset($_POST['productType']) ? $_POST['productType'] : null;
      $this->weight = isset($_POST['weight']) ? $_POST['weight'] : null;
    }
    
    public function insertBookData() {
      $conn = mysqli_connect('localhost', 'root', 'root', 'productsDB');
      $stmt = $conn->prepare("INSERT INTO products (sku, name, price, type, weight) VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param('sssss', $this->sku, $this->name, $this->price, $this->type, $this->weight);
      
      $stmt->execute();
      
      header('Location: index.php', true, 303); exit;
    }
  }
  
  $DVD = new DVD();
  if(!empty($_POST) && ($_POST['productType'] == 'DVD')) {
    $DVD->insertDVDdata();
   }
   
  $Furniture = new Furniture();
  if(!empty($_POST) && ($_POST['productType'] == 'Furniture')) {
    $Furniture->insertFurnitureData();
   }
   
  $Book = new Book();
  if(!empty($_POST) && ($_POST['productType']) == 'Book') {
    $Book->insertBookData();
  }
?>
