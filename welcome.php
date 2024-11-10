<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])){
    header("Location: login.php"); // Redirect to the login if not logged in
    exit;
}

// User logged in, show welcome message
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
    </head>
    <body>

        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_id']); ?>!</h2>
        <p>You are now logged in.</p>
        
    </body>
</html>