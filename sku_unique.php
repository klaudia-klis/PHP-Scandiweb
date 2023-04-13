<?php
// See comment on this line in index.php
 include 'inc/autoload.php';
 
 $Unique = new Sku_unique();
 $Unique->check_uniqueness(); 

?>