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
        <!-- Display error messages -->
     <?php 
     if (isset($_SESSION["registration_error"])) {
        echo "<p style='color:red;'>{$_SESSION['registration_error']}</p>";
        unset($_SESSION['registration_error']);
     }
     ?>
        <form method="POST" action="process_registration.php" id="register">
            <label for="email">Email: </label><br>
            <input type="email" name="email" id="email" required><br><br>
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" minlength="8" required><br><br>
        <div id="passwordStrength" style="font-size: 14px;"></div>
        <input type="submit" value="Register"><br>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </body>
</html>
<script>
    // Show password strength
    document.getElementById("password").addEventListener("input", function() {
        var password = this.value;
        var strengthMessage = "";
        var strength = 0;

        // Check password length
        if (password.length >= 8) strength++;

        // Check for uppercase letter
        if (/[A-Z]/.test(password)) strength++;

        // Check for lowercase letter
        if (/[a-z]/.test(password)) strength++;

        // Check for digit
        if (/\d/.test(password)) strength++;

        // Check for special characters
        if (/\W_/.test(password)) strength++;

        // Set strength level based on conditions
        if (strength < 2) {
            strengthMessage = "Weak";
        } else if (strength < 4) {
            strengthMessage = "Moderate";
        } else {
            strengthMessage = "Strong";
        }

        // Display strength message
        document.getElementById("passwordStrength").textContent = "Password Strength: " + strengthMessage;
    });
</script>