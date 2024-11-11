<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION["user_id"])) {
    header("Location: welcome.php"); // Redirect to the welcom page if logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initail-scale=1.0">
        <!-- Add meta description here -->
        <title>Login</title>
    </head>
    <body>

    <h2>Login</h2>

    <!-- Display error messages -->
     <?php 
     if (isset($_SESSION["login_error"])) {
        echo "<p style='color:red;'>{$_SESSION['login_error']}</p>";
        unset($_SESSION['login_error']);
     }
     ?>

     <form method="POST" action="process_login.php">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
     </form>
     <p>Don't have an account? <a href="register.php">join now</a></p>
    </body>
</html>