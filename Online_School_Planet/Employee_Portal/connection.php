<?php
$servername = "localhost";
$username = "sharvan";
$password = "sharvan123";
$dbname = "data_demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>