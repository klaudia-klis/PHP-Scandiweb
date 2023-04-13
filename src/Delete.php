<?php

class Delete 
{
  public function delete_products() {
    $conn = new Connection();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-product-btn']) && isset($_POST['delete_id'])) {
      
      // Fetching all id numbers of the checked products.
      foreach($_POST['delete_id'] as $deletesku) {
        $sql = $conn->connect();
        $query2 = $sql->prepare("DELETE FROM products WHERE sku IN(?)");
        $query2->bind_param('s', $deletesku);
        $query2->execute();
      }
      
      // Using header function to prevent form resubmission.
      header('Location: index.php', true, 303); exit;
      
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-product-btn']) && empty($_POST['delete_id'])) {
      header('Location: index.php', true, 303); exit;
    }
  }
}