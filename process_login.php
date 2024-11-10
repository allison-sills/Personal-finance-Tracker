<?php
session_start(); // Start the session
include 'db.php'; // Include the database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL query to get the user's password from the database
    $sql = "SELECT user_id, password FROM users WHERE username= ?";
    $stmt = $conn->prepare($sql);  // Prepare the SQL statement to avoid SQL injection
    $stmt->bind_param("s", $username); // Bind the username to the query
    $stmt->execute(); // Execute the query
    $result = $stmt->get_result(); // Get the result of the query
    
   // Check if the username exists and the password is correct
   if ($result->num_rows > 0){
    $row = $result->fetch_assoc(); // Fetch the user data
    if($password === $row['password']){ // Compare the password
        $_SESSION['user_id'] = $row['user_id']; // Store user data in session
        $_SESSION['logged_in'] = true;
        header("Location: welcome.php");
        exit;
    }
    else {
        $_SESSION['login_error'] = 'Invalid username or password';
        header('Location: login.php');
        exit;
    }
   } else {
    $_SESSION['login_error'] = 'Invalid username or password';
    header("Location: login.php");
    exit;
    }
}
