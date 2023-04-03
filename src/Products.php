<?php

class Products 
{
  // Accessing all the data from database.  
  public static function getAll() 
  {
    // Open db connection.
    $conn = new Connection();
    // Get stuff from db.
    $result = mysqli_query($conn->connect(), "SELECT * FROM products");
    
    $itemList = [];
    
    foreach($result as $item) {
      $description = NULL;
      
      if (!is_null($item['size'])) {
        $description = "Size: $item[size] MB";
      } else if (!is_null($item['weight'])) {
        $description = "Weight: $item[weight] KG";
      } else if (!is_null($item['height'])) {
        $description = "Dimension: $item[height]x$item[width]x$item[length] CM";
      }
      array_push($itemList, 
      new ListItem(
        $item["id"],
        $item["sku"],
        $item["name"],
        $item["price"],
        $description,
      ));
    }
    
    return $itemList;
  }
}

?>