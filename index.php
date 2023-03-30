<?php

require __DIR__ . '/inc/header.php';

  include 'database.php';
  include 'delete.php';
  include 'insert_products.php';

  class All_Products {
    
    // Accessing all the data from database.
    public function display_all() {
      $conn = mysqli_connect('localhost', 'root', 'root', 'productsDB');
      $query1 = mysqli_query($conn, "SELECT * FROM products WHERE size IS NOT NULL OR weight IS NOT NULL OR (height IS NOT NULL AND width IS NOT NULL AND length IS NOT NULL)");
      
      while ($row1 = mysqli_fetch_array($query1)) {
        echo "<label class='delete-checkbox'>";
        echo "<input type='checkbox' name='delete_id[]' value=$row1[id]>";
        echo "<p>$row1[sku]</p>";
        echo "<p>$row1[name]</p>";
        echo "<p>$row1[price] $</p>";
        echo "<p id='display_size'>$row1[size]</p>";
        echo "<p id='display_weight'>$row1[weight]</p>";
        echo "<p>$row1[height] $row1[width] $row1[length]</p>";
        echo "</label>";
    }
  }
}
?>

<form id="checkbox-form" method="post" action="index.php">
  <div class="checkboxes">
    <?php
      $Display = new All_Products();
      $Display->display_all();
    ?> 
  </div>
  
</form>
<br><br>
<?php

require __DIR__ . '/inc/footer.php';

?>
