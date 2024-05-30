<?php

$conn = mysqli_connect('localhost','root','','kenshindb');

// create database connectivity
$servername = "localhost";
$username = "root";
$password = "";
$database = "kenshindb";
// Create connection
$con = new mysqli($servername, $username, $password, $database);
// Check connection
if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
}


?>