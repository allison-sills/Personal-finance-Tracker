<?php
session_start(); // Start the session

include 'functions.php'; // Include functions file for needed functions

// Check if the user is logged in
if (!isset($_SESSION['user_id'])){
    header("Location: login.php"); // Redirect to the login if not logged in
    exit;
}

// Include the database connection file
include 'db.php'; // Make sure this file includes the database connection

// Get the user_id from the session
$user_id = $_SESSION['user_id'];

// Call the function to get the username
$username = getUsernameById($user_id, $conn);

if ($username === null) {
    // If username not found, log them out (optional)
    session_destroy();
    header("Location: login.php");
    exit;
}

$conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
    </head>
    <body>
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>You are now logged in.</p>
        <h3>Select from the following options:</h3>


        <a href="logout.php">Logout</a>
    </body>
</html>
