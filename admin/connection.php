<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ushddb";

// Create connection
$conn = mysqli_connect('localhost','id19537118_ushd','-Y1dGOVy]!x/42Ei','id19537118_ushddb') or die(mysqli_error());

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}else{
  //echo "Connected successfully";
}

?>