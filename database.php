<?php

$servername = "localhost";
$username = "root";
$password = "root";
$database = "productsDB";

  $conn = mysqli_connect($servername, $username, $password, $database);
  
  if(!$conn){
    die('Could not connect:' . mysqli_error());
  }
  
  ?>