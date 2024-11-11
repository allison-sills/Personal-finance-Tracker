<?php
// Database connection file

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finance tracker";

// Create connection
$conn = new mysqli($servername, $username, $password,
$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);

}
// echo "Connected sucessfully"; // For debugging