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
            $('#sku_response').html("<span style='color: red;'>This field is requierd.</span>");
          }
          
        });
        
      });
    </script>
    
    <script>
      $(document).ready(function() {
        $('#sku').on('input', function () {
          check_sku();
        });
        $('#name').on('input', function () {
          check_name();
        });
        $('#price').on('input', function () {
          check_price();
        });
        $('#size').on('input', function () {
          check_size();
        });
        $('#weight').on('input', function () {
          check_weight();
        });
        $('#height').on('input', function () {
          check_height();
        });
        $('#width').on('input', function () {
          check_width();
        });
        $('#length').on('input', function () {
          check_length();
        });
      });
    
      function check_sku() {
        var pattern = /^[A-Za-z0-9]+$/;
        var sku = $('#sku').val();
        var valid_sku = pattern.test(sku);
        if (sku.length > 10) {
          $('#sku_err').html("This SKU is too long.");
          return false;
        } else if (!valid_sku && sku !== '') {
          $('#sku_err').html("This field should contain only letters and numbers.");
          return false;
        } else {
          $('#sku_err').html('');
          return true;
        }
      }
      
      function check_name() {
        var pattern = /^[A-Za-z0-9]+$/;
        var name = $('#name').val();
        var valid_name = pattern.test(name);
        if (!valid_name && name !== '') {
          $('#name_err').html("This field should contain only letters and numbers.");
          return false;
        } else if (name === ''){
          $('#name_err').html("This field is required.");
          return false;
        } else if (name.length > 50) {
          $('#name_err').html("This name is too long.");
          return false;
        } else {
          $('#name_err').html('');
          return true;
        }
      }
      
      function check_price() {
        var pattern = /^\d*\.?\d*$/;
        var price = $('#price').val();
        var valid_price = pattern.test(price);
        if (!valid_price && price !== '') {
          $('#price_err').html('This field should contain only numbers.');
          return false;
        } else if (price === '') {
          $('#price_err').html('This field is required.');
          return false;
        } else if (price.length > 10) {
          $('#price_err').html("Input value is too long.");
          return false;
        } else {
          $('#price_err').html('');
          return true;
        }
      }
      
      function check_size() {
        var pattern = /^\d*\.?\d*$/;
        var size = $('#size').val();
        var valid_size = pattern.test(size);
        if (!valid_size && size !== '') {
          $('#size_err').html('This field should contain only numbers.');
          return false;
        } else if (size === '') {
          $('#size_err').html('This field is required.');
          return false;
        } else if (size.length > 10) {
          $('#size_err').html("Input value is too big.");
          return false;
        } else {
          $('#size_err').html('');
          return true;
        }
      }
      
      function check_weight() {
        var pattern = /^\d*\.?\d*$/;
        var weight = $('#weight').val();
        var valid_weight = pattern.test(weight);
        if (!valid_weight && weight !== '') {
          $('#weight_err').html('This field should contain only numbers.');
          return false;
        } else if (weight === '') {
          $('#weight_err').html('This field is required.');
          return false;
        } else if (weight.length > 10) {
          $('#weight_err').html("Input value is too big.");
          return false;
        } else {
          $('#weight_err').html('');
          return true;
        }
      }
      
      function check_height() {
        var pattern = /^\d*\.?\d*$/;
        var height = $('#height').val();
        var valid_height = pattern.test(height);
        if (!valid_height && height !== '') {
          $('#height_err').html('This field should contain only numbers.');
          return false;
        } else if (height === '') {
          $('#height_err').html('This field is required.');
          return false;
        } else if (height.length > 10) {
          $('#height_err').html("Input value is too big.");
          return false;
        } else {
          $('#height_err').html('');
          return true;
        }
      }
      
      function check_width() {
        var pattern = /^\d*\.?\d*$/;
        var width = $('#width').val();
        var valid_width = pattern.test(width);
        if (!valid_width && width !== '') {
          $('#width_err').html('This field should contain only numbers.');
          return false;
        } else if (width === '') {
          $('#width_err').html('This field is required.');
          return false;
        } else if (width.length > 10) {
          $('#width_err').html("Input value is too big.");
          return false;
        } else {
          $('#width_err').html('');
          return true;
        }
      }
      
      function check_length() {
        var pattern = /^\d*\.?\d*$/;
        var length_ = $('#length').val();
        var valid_length = pattern.test(length_);
        if (!valid_length && length_ !== '') {
          $('#length_err').html('This field should contain only numbers.');
          return false;
        } else if (length_ === '') {
          $('#length_err').html('This field is required.');
          return false;
        } else if (length_.length > 10) {
          $('#length_err').html("Input value is too big.");
          return false;
        } else {
          $('#length_err').html('');
          return true;
        }
      }
    </script>
  </head>
  
  <body class="center">
    
    <div class="topnav">
      <a href="add-product.php"><h1>Product add</h1></a>
      <div class="nav-button">
        <button class="submit_button" name="submit_button" type="submit" form="product_form">Save</button>
        <button><a href="index.php">Cancel</a></button>
      </div>
    </div>

<main>
  <form id="product_form" action='index.php' method="post">
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
      <option value="DVD">DVD</option>
      <option value="Furniture">Furniture</option>
      <option value="Book">Book</option>
    </select><br><br>
    
    <div id="DVD-m">
      <label for="size">Size (MB)</label>
      <input type="text" id="size" name="size" placeholder="800">
      <div class="errors" id="size_err"></div>
      <p><small>*Please provide size in MB.</small></p><br><br>
    </div>
    
    <div id="Furniture-m">
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
    
    <div id="Book-m">
      <label for="weight">Weight (KG)</label>
      <input type="text" id="weight" name="weight" placeholder="1.00">
      <div class="errors" id="weight_err"></div>
      <p><small>*Please provide weight in KG.</small></p><br><br>
    </div>
  </form>

<?php 
  
  require __DIR__ . '/inc/footer.php';

?>