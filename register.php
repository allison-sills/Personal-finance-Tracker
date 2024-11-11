<?php 
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION["user_id"])){
    header("Location: welcome.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initail-scale=1.0">
        <!-- Add meta description here -->
        <title>Register</title>
    </head>
    <body>
        <h2>Register</h2>
        <form method="POST" action="process_registration.php" id="register">
            <label for="email">Email: </label><br>
            <input type="email" name="email" id="email" required><br><br>
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" value="Register"><br>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </body>
</html>