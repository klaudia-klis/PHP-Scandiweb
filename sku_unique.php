<?php
 include 'database.php';
 
 if(isset($_POST['sku'])){
   $sku = mysqli_real_escape_string($conn,$_POST['sku']);
   
   $query = "SELECT COUNT(*) AS cntSku FROM products WHERE sku='".$sku."'";
   
   $result = mysqli_query($conn,$query);
   $response = "<span style='color: green;'>SKU available.</span>";
   if(mysqli_num_rows($result)){
     $row = mysqli_fetch_array($result);
     
     $count = $row['cntSku'];
     
     if($count > 0) {
       $response = "<span style='color: red;'>SKU not available.</span>";
     }
     
   }
   echo $response;
   die;
 }
 
?>