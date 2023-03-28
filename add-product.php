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
        var sT = product_form.productType;
        
        document.getElementById("DVD-m").style.display = "none";
        document.getElementById("Furniture-m").style.display = "none";
        document.getElementById("Book-m").style.display = "none";
        
        document.getElementById("size").removeAttribute('required');
        document.getElementById("height").removeAttribute('required');
        document.getElementById("width").removeAttribute('required');
        document.getElementById("length").removeAttribute('required');
        document.getElementById("weight").removeAttribute('required');
        
        if (sT.value === 'DVD') {
          document.getElementById("DVD-m").style.display = "block";
          document.getElementById("size").setAttribute('required', '');
        } else if (sT.value === 'Furniture') {
          document.getElementById("Furniture-m").style.display = "block";
          document.getElementById("height").setAttribute('required', '');
          document.getElementById("width").setAttribute('required', '');
          document.getElementById("length").setAttribute('required', '');
        } else if (sT.value === 'Book') {
          document.getElementById("Book-m").style.display = "block";
          document.getElementById("weight").setAttribute('required', '');
        }
      }
      
     </script>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     
     <script> 
      $(document).ready(function(){
        
        $("#sku").keyup(function(){
          var sku = $(this).val();          
          if(sku != ""){
            
            $.ajax({
              url: 'sku_unique.php',
              type: 'post',
              data: {sku: sku},
              success: function(response){
                
                $('#sku_response').html(response);
              }
            });
          }else{
            $('#sku_response').html("<span style='color: red;'>Enter valid SKU!</span>");
          }
          
        });
        
      });
    </script>
  </head>
  
  <body class="center">
    
    <div class="topnav">
      <a href="add-product.php"><h1>Product add</h1></a>
      <div class="nav-button">
        <button name="submit_button" type="submit" form="product_form">Save</button>
        <button><a href="index.php">Cancel</a></button>
      </div>
    </div>

<main>
  <form id="product_form" action='index.php' method="post">
    <label for="sku">SKU</label>
    <input type="text" id="sku" name="sku" placeholder="ABCD10101" required>
    <div id="sku_response"></div><br><br>
    
    <label for="name">Name</label>
    <input type="text" id="name" name="name" placeholder="War and Peace" required><br><br>
    
    <label for="price">Price ($)</label>
    <input type="text" id="price" name="price" placeholder="20.00" required><br><br>
    
    <label for="type" class="type-switcher">Type Switcher</label>
    <select onChange="typeSwitcher()" id="productType" name="productType" form="product_form" required>
      <option value="" disabled selected>Select type</option>
      <option value="DVD">DVD</option>
      <option value="Furniture">Furniture</option>
      <option value="Book">Book</option>
    </select><br><br>
    
    <div id="DVD-m">
      <label for="size">Size (MB)</label>
      <input type="text" id="size" name="size" placeholder="800"><br>
      <p><small>*Please provide size in MB.</small></p><br><br>
    </div>
    
    <div id="Furniture-m">
      <label for="height">Height (CM)</label>
      <input type="text" id="height" name="height" placeholder="200.00"><br><br>
      <label for="width">Width (CM)</label>
      <input type="text" id="width" name="width" placeholder="40.00"><br><br>
      <label for="length">Length (CM)</label>
      <input type="text" id="length" name="length" placeholder="60.00"><br>
      <p><small>*Please provide dimensions in HxWxL format.</small></p><br><br>
    </div>
    
    <div id="Book-m">
      <label for="weight">Weight (KG)</label>
      <input type="text" id="weight" name="weight" placeholder="1.00">
      <p><small>*Please provide weight in KG.</small></p>
    </div>
  </form>

<?php 
  
  require __DIR__ . '/inc/footer.php';

?>