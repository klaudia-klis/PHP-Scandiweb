<?php
// See comment on this line in index.php
include 'inc/autoload.php';

$DVD = new DVD();
if(!empty($_POST) && (!empty($_POST['size']))) {
  $DVD->insertDVDdata();
}
 
$Furniture = new Furniture();
if(!empty($_POST) && (!empty($_POST['height']))) {
  $Furniture->insertFurnitureData();
 }
 
$Book = new Book();
if(!empty($_POST) && (!empty($_POST['weight']))) {
  $Book->insertBookData();
}
?>
