<?php
// See comment on this line in index.php
 include 'inc/autoload.php';
 
 $conn = new Connection();
 
 if(isset($_POST['sku'])){
   
   // Using mysqli_real_escape_string function to create an SQL string used below in an SQL statement.
   
   $sku = mysqli_real_escape_string($conn->connect(), $_POST['sku']);
   
   $query = "SELECT COUNT(*) AS cntSku FROM products WHERE sku='".$sku."'";
   
   $result = mysqli_query($conn->connect(), $query);
   $response = ""; // No response for valid SKU.
   
   // Using jQuery method to remove attribute 'disabled' from Submit Form button when provided SKU is valid.
   
   echo "<script>";
   echo "$('.submit_button').removeAttr('disabled');";
   echo "</script>";
   
   if(mysqli_num_rows($result)){
     $row = mysqli_fetch_array($result);
     
     $GLOBALS['count'] = $row['cntSku'];
     
     if($count > 0) {
       $response = "<span style='color: red;'>SKU not available.</span>";
       
       // Using jQuery method to add attribute 'disabled' to prevent submitting form with SKU that already exists in database.
       
       echo "<script>";
       echo "$('.submit_button').attr('disabled', '');";
       echo "</script>";
     }
     
   }
   echo $response;
   die;
 }
 
?>