<?php
// functions.php

function getUsernameById($user_id, $conn) {
    // Query to get the username from the database
    $sql = "SELECT username FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);  // Prepare the SQL query
    $stmt->bind_param("i", $user_id);  // Bind the user_id to the query
    $stmt->execute();  // Execute the query
    $result = $stmt->get_result();  // Get the result

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['username'];  // Return the username
    } else {
        return null;  // Return null if user not found
    }
}
