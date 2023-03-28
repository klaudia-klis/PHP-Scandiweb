<?php

require __DIR__ . '/inc/header.php';

  include 'database.php';
  include 'delete.php';
  include 'insert_products.php';
  
$query1 = mysqli_query($conn, "select * from products");

?>

<form id="checkbox-form" method="post" action="index.php">
  <div class="checkboxes">
  <?php
      while ($row1 = mysqli_fetch_array($query1)) {
  ?>  
      <label class="delete-checkbox">
        <input type="checkbox" name="delete_id[]" value="<?php echo $row1['id']; ?>">
        <?php 
          echo '<br>' . $row1[1] . '<br>' . $row1[2] . '<br>' . $row1[3] . '$' . '<br>';
          if($row1['type'] == 'Book') {
            echo 'Weight: ' . $row1['weight'] . ' KG';
          } else if ($row1['type'] == 'Furniture') {
            echo 'Dimension: ' . $row1['height'] . 'x' . $row1['width'] . 'x' . $row1['length']; 
          } else if ($row1['type'] == 'DVD') {
            echo 'Size: ' . $row1['size'] . ' MB';
          }
        ?>
      </label>
  <?php
    }
  ?>
  </div>
  
</form>

<?php

require __DIR__ . '/inc/footer.php';

?>
