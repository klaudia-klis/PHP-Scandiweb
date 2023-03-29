<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-product-btn']) && isset($_POST['delete_id'])) {
    
    // Fetching all id numbers of the checked products.
    $all_id = $_POST['delete_id'];
    
    //Using implode function to get all id numbers as a string.
    $extract_id = implode(',' , $all_id);
  
    // Using prepared statement to prevent SQL injections.
    $query2 = $conn->prepare("DELETE FROM products WHERE id IN(?)");
    $query2->bind_param('s', $extract_id);
    $query2->execute();
    
    // Using header function to prevent form resubmission.
    header('Location: index.php', true, 303); exit;
    
  } else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-product-btn']) && empty($_POST['delete_id'])) {
    header('Location: index.php', true, 303); exit;
  }
?>