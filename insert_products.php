<?php
$_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']);
  if(isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && ($_POST['productType'] == 'Book') && isset($_POST['weight'])) {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["productType"];
    $weight = $_POST["weight"];
    
    $sql = "INSERT INTO products (sku, name, price, type, weight) VALUES ('$sku', '$name', '$price', '$type', '$weight')";
    $query= mysqli_query($conn, $sql);
    
    header('Location: index.php', true, 303); exit;
    
  } else if(isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && ($_POST['productType'] == 'DVD') && isset($_POST['size'])) {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["productType"];
    $size = $_POST["size"];
    
    $sql = "INSERT INTO products (sku, name, price, type, size) VALUES ('$sku', '$name', '$price', '$type', '$size')";
    $query= mysqli_query($conn, $sql);
    
    header('Location: index.php', true, 303); exit;
    
  } else if(isset($_POST['sku']) && isset($_POST['name']) && isset($_POST['price']) && ($_POST['productType'] == 'Furniture') && isset($_POST['width']) && isset($_POST['height']) && isset($_POST['length'])) {
    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $type = $_POST["productType"];
    $height = $_POST["height"];
    $length = $_POST["length"];
    $width = $_POST["width"];
    
    $sql = "INSERT INTO products (sku, name, price, type, height, width, length) VALUES ('$sku', '$name', '$price', '$type', '$height', '$width', '$length')";
    $query= mysqli_query($conn, $sql);
    
    header('Location: index.php', true, 303); exit;
    
  //  if($query) {
  //    echo 'Entry successfull';
  //  } else {
  //    echo 'Error Occurred'; 
  //  }
  }

?>
