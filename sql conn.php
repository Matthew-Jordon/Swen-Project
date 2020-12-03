<?php
$servername = "localhost";
$user = "test";
$password = "Comp2140";
$dbase = " database";

//create connection
$conn =new mysqli($servername,$user,$password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>