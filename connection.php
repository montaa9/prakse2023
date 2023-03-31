<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database = "prakse";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, "utf8");
date_default_timezone_set('Europe/Riga');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>