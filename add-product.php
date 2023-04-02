<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/style.css"/>
    <title>Add product</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
     
  </head>
  
  <body class="center">
    
    <div class="topnav">
      <a href="/add-product.php"><h1>Product add</h1></a>
      <div class="nav-button">
        <button class="submit_button" name="submit_button" type="submit" form="product_form">Save</button>
        <a href="/index.php"><button>Cancel</button></a>
      </div>
    </div>

<main>
  <form id="product_form" action='/insert_products.php' method="post">
    <label for="sku">SKU</label>
    <input type="text" id="sku" name="sku" placeholder="ABCD10101" required>
    <div class="errors" id="sku_response"></div><div class="errors" id="sku_err"></div><br>
    
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="War and Peace" required>
    <div class="errors" id="name_err"></div><br>
    
    <label for="price">Price ($)</label>
    <input type="text" id="price" name="price" placeholder="20.00" required>
    <div class="errors" id="price_err"></div><br>
    
    <label for="type" class="type-switcher">Type Switcher</label>
    <select onChange="typeSwitcher()" id="productType" name="productType" form="product_form" required>
      <option value="" disabled selected>Select type</option>
      <option id="DVD" value="DVD">DVD</option>
      <option id="Furniture" value="Furniture">Furniture</option>
      <option id="Book" value="Book">Book</option>
    </select><br><br>
    
    <div id="dvd-m">
      <label for="size">Size (MB)</label>
      <input type="text" id="size" name="size" placeholder="800">
      <div class="errors" id="size_err"></div>
      <p><small>*Please provide size in MB.</small></p><br><br>
    </div>
    
    <div id="furniture-m">
      <label for="height">Height (CM)</label>
      <input type="text" id="height" name="height" placeholder="200.00">
      <div class="errors" id="height_err"></div><br>
      
      <label for="width">Width (CM)</label>
      <input type="text" id="width" name="width" placeholder="40.00">
      <div class="errors" id="width_err"></div><br>
      
      <label for="length">Length (CM)</label>
      <input type="text" id="length" name="length" placeholder="60.00">
      <div class="errors" id="length_err"></div>
      <p><small>*Please provide dimensions in HxWxL format.</small></p><br><br>
    </div>
    
    <div id="book-m">
      <label for="weight">Weight (KG)</label>
      <input type="text" id="weight" name="weight" placeholder="1.00">
      <div class="errors" id="weight_err"></div>
      <p><small>*Please provide weight in KG.</small></p><br><br>
    </div>
  </form>

<?php 
  
  require __DIR__ . '/inc/footer.php';

?>