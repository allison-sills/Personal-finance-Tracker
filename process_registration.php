<?php
session_start(); // Start the session
include 'db.php'; // Include database connection

// Check if the form is submitted
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // SQL query to insert the user's credentials into the database
    $sql = "INSERT INTO users(email, username, password) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $email, $username, $hashed_password);

    if ($stmt->execute()){
        header("location: login.php");
    } else{
        echo "Error: Could not register user.";
    }

    $conn->close();
    $stmt->close();

}
