<?php
// Database connection
include_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input from the form
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    //Fetch the user from the database
    $sql = "SELECT * FROM students WHERE fullname = '$fullname'";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Password is correct, redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect password";
        }
    } else {
        // No user found with the provided fullname
        echo "User not found";
    }
}
?>

