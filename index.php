<?php

require __DIR__ . '/inc/header.php';

  include 'database.php';
  // Accessing all the data from database.
  class Products {
    
    public static function getAll() {
      // open db connection
      $conn = new Connection();
      // get stuff from db
      $result = mysqli_query($conn->connect(), "SELECT * FROM products");
      // turn stuff into product list
     // $products = [];
     foreach($result as $item) {
       $products = [];
       array_push($products, (object)[
         'sku' => $item['sku'],
         'name' => $item['name'],
         'price' => $item['price'],
         'size' => $item['size'],
         'weight' => $item['weight'],
         'height' => $item['height'],
         'width' => $item['width'],
         'length' => $item['length'],
        ]);
      } return $products;
     // loop ($result) {
      //  $products << [ "id" => $result.id, ]
      //return $result;
    }
  }
?>

<form id="checkbox-form" method="post" action="/delete.php">
  <div class="checkboxes">
    <?php foreach(Products::getAll() as $item): ?>
      <pre><?= var_dump($item) ?></pre>
      <label class="delete-checkbox">
        <input type="checkbox" name="delete_id[]" value="<?= $item["id"] ?>">
          <p><?= $item["sku"] ?></p>
          <p><?= $item["name"] ?></p>
          <p><?= $item["price"] ?></p>
          <p><?= $item["size"] ?></p>
          <p><?= $item["weight"] ?></p>
      </label>
    <?php endforeach; ?>
  </div>
  
</form>
<br><br>
<?php

require __DIR__ . '/inc/footer.php';

?>
