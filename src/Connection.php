<?php

class Connection 
{
  private $servername;
  private $username;
  private $password;
  private $database;
  
  public function __construct() 
  {
    $this->servername = getenv("servername");
    $this->username = getenv("username");
    $this->password = getenv("password");
    $this->database = getenv("database");
  }
  
  public function connect() 
  {
    $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
    if (!$conn) {
      die('Could not connect:' . mysqli_error());
    } else {
      return $conn;
    }
  }
}
  
?>