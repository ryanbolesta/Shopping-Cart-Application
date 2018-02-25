<?php
$servername = "localhost";
$username = "rbole934";
$password = "3ustasaYuz";
$database = "rbole934_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>

