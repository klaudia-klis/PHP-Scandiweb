<?php

require __DIR__ . '/inc/header.php';

  include 'database.php';
  include 'delete.php';
  include 'insert_products.php';

// Accessing all the data from database.
$query1 = mysqli_query($conn, "SELECT * FROM products");

?>

<form id="checkbox-form" method="post" action="index.php">
  <div class="checkboxes">
  <?php
      while ($row1 = mysqli_fetch_array($query1)) {
  ?>  
      <label class="delete-checkbox">
        <input type="checkbox" name="delete_id[]" value="<?php echo $row1['id']; ?>">
        <p><?= $row1[1] ?></p>
        <p><?= $row1[2] ?></p>
        <p><?= $row1[3] . ' $' ?></p>
        <?php
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
<br><br>
<?php

require __DIR__ . '/inc/footer.php';

?>
