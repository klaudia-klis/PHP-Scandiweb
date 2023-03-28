<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-product-btn']) && isset($_POST['delete_id'])) {

  $all_id = $_POST['delete_id'];
  $extract_id = implode(',' , $all_id);
  // echo $extract_id;
  $query2 = "DELETE FROM products WHERE id IN($extract_id)";
  $query_run = mysqli_query($conn, $query2);
  
  header('Location: index.php', true, 303); exit;
} else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete-product-btn']) && empty($_POST['delete_id'])) {
  header('Location: index.php', true, 303); exit;
}
?>