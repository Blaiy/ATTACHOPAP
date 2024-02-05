<?php
include '../db.php';

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    $course = isset($_POST["course"]) ? $_POST["course"] : '';
    $institution = isset($_POST["institution"]) ? $_POST["institution"] : '';

    // Insert data into the database
    $sql = "INSERT INTO students (fullname, email, password, course, institution) VALUES ('$fullname', '$email', '$password', '$course', '$institution')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
