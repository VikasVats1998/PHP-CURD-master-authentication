<?php

// Connect to the database
include"db_connection.php";

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    // Create the SQL query
    $sql = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";

    // Execute the query
    $result = mysqli_query($connection, $sql);

    // Check if a matching row was found
    if (mysqli_num_rows($result) == 1) {
        // Start a new session
        session_start();

        // Store the username in a session variable
        $_SESSION['username'] = $username;

        // Redirect to the dashboard page
        header("Location: home.php");
        exit;
    } else {
        // Show an error message
        echo "Username or password is incorrect.";
    }
}

?>