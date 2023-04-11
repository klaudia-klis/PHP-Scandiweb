// A function to dynamically changed the form when product type is switched.
function typeSwitcher() {
  var sT = product_form.productType;
  
  document.getElementById("dvd-m").style.display = "none";
  document.getElementById("furniture-m").style.display = "none";
  document.getElementById("book-m").style.display = "none";
  
  document.getElementById("size").removeAttribute('required');
  document.getElementById("height").removeAttribute('required');
  document.getElementById("width").removeAttribute('required');
  document.getElementById("length").removeAttribute('required');
  document.getElementById("weight").removeAttribute('required');
  
  if (sT.value === 'DVD') {
    document.getElementById("dvd-m").style.display = "block";
    document.getElementById("size").setAttribute('required', '');
  } else if (sT.value === 'Furniture') {
    document.getElementById("furniture-m").style.display = "block";
    document.getElementById("height").setAttribute('required', '');
    document.getElementById("width").setAttribute('required', '');
    document.getElementById("length").setAttribute('required', '');
  } else if (sT.value === 'Book') {
    document.getElementById("book-m").style.display = "block";
    document.getElementById("weight").setAttribute('required', '');
  }
}

// A function to check the uniqueness of provided by user SKU.
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

// Functions to check validations of provided by User inputs. 
$(document).ready(function() {
  $('#sku').on('input', function () {
    check_sku();
  });
  $('#name').on('input', function () {
    $('.submit_button').attr('disabled', '');
    check_name();
  });
  $('#price').on('input', function () {
    $('.submit_button').attr('disabled', '');
    check_price();
  });
  $('#size').on('input', function () {
    $('.submit_button').attr('disabled', '');
    check_size();
  });
  $('#weight').on('input', function () {
    $('.submit_button').attr('disabled', '');
    check_weight();
  });
  $('#height').on('input', function () {
    $('.submit_button').attr('disabled', '');
    check_height();
  });
  $('#width').on('input', function () {
    $('.submit_button').attr('disabled', '');
    check_width();
  });
  $('#length').on('input', function () {
    $('.submit_button').attr('disabled', '');
    check_length();
  });
});

// Validation for SKU input.
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

// Validation for Name input.
function check_name() {
  var pattern = /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/;
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
    $('.submit_button').removeAttr('disabled');
    return true;
  }
}

// Validation for Price input.
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
    $('.submit_button').removeAttr('disabled');
    return true;
  }
}

// Validation for Size input.
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
    $('.submit_button').removeAttr('disabled');
    return true;
  }
}

// Validation for Weight input.
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
    $('.submit_button').removeAttr('disabled');
    return true;
  }
}

// Validation for Height input.
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
    $('.submit_button').removeAttr('disabled');
    return true;
  }
}

// Validation for Width input.
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
    $('.submit_button').removeAttr('disabled');
    return true;
  }
}

// Validation for Length input.
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
    $('.submit_button').removeAttr('disabled');
    return true;
  }
}