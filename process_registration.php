<?php
session_start(); // Start the session
include 'db.php'; // Include database connection

// Check if the form is submitted
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Check that the password is secure
    if(strlen($_POST['password'] < 8)){
        $_SESSION['registration_error'] = 'Password must contain at least 8 characters';
    }elseif(!preg_match('[A-Z]/', $_POST['password'])){
        $_SESSION['registration_error'] = 'Password must contain at least one uppercase letter';
    } elseif(!preg_match('/[a-z]/', $_POST['password'])){
        $_SESSION['registration_error'] = 'Password must contain at least one lowercase letter';
    } elseif(!preg_match('/[0-9]/', $_POST['password'])){
        $_SESSION['registration_error'] = 'Password must contain at least one number';
    } elseif(!preg_match('/[\W_]/', $_POST['password'])){
        $_SESSION['registration_error'] = 'Password must contain at least one special character (e.g., !, @, #, $, etc.)';
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    // SQL query to insert the user's credentials into the database
    $sql = "INSERT INTO users(email, username, password) VALUES (?,?,?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sss", $email, $username, $hashed_password);

    if ($stmt->execute()){
        header("location: login.php");
    } else{
        $_SESSION['registration_error'] = 'an error occurred while registering your account';
    }

    $conn->close();
    $stmt->close();

}
