<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <style>
      <?php include 'css/style.css'; ?>
    </style>
    
    <script>
      function typeSwitcher() {
        var sT = product_form.type;
        document.getElementById("DVD-m").style.display = "none";
        document.getElementById("Furniture-m").style.display = "none";
        document.getElementById("Book-m").style.display = "none";
        if (sT.value === 'DVD') {
          document.getElementById("DVD-m").style.display = "block";
        } else if (sT.value === 'Furniture') {
          document.getElementById("Furniture-m").style.display = "block";
        } else if (sT.value === 'Book') {
          document.getElementById("Book-m").style.display = "block";
        }
      }
    </script>
  </head>
  
  <body class="center">
    <div class="topnav">
      <a href="add-product.php"><h1>Product Add</h1></a>
      <div class="nav-button">
        <button>Save</button>
        <button>Cancel</button>
      </div>
    </div>

<main>
  <form id="product_form" action='' method="POST">
    <label for="sku">SKU</label>
    <input type="text" id="sku" required><br><br>
    
    <label for="name">Name</label>
    <input type="text" id="name" required><br><br>
    
    <label for="price">Price($)</label>
    <input type="text" id="price" required><br><br>
    
    <label for="type">Type Switcher</label>
    <select onChange="typeSwitcher()" id="productType" name="type" form="product_form" required>
      <option value="" disabled selected>--select--</option>
      <option value="DVD">DVD</option>
      <option value="Furniture">Furniture</option>
      <option value="Book">Book</option>
    </select><br><br><br>
    
    <div id="DVD-m">
      <label for="size">Size (MB)</label>
      <input type="text" id="size" required><br>
      <p><small>Please provide size in MB</small></p><br><br>
    </div>
    
    <div id="Furniture-m">
      <label for="height">Height (CM)</label>
      <input type="text" id="height" required><br><br>
      <label for="width">Width (CM)</label>
      <input type="text" id="width" required><br><br>
      <label for="length">Length (CM)</label>
      <input type="text" id="length" required><br>
      <p><small>Please provide dimensions in HxWxL format</small></p><br><br>
    </div>
    
    <div id="Book-m">
      <label for="weight">Weight (KG)</label>
      <input type="text" id="weight" required>
      <p><small>Please provide weight in KG</small></p>
    </div>
    
  </form>



<?php 
  
  require __DIR__ . '/inc/footer.php';

?>