<?php
<<<<<<< HEAD
include '../db.php';
=======
include 'db.php';
>>>>>>> a88fea83ac0e8e13f6a29ca10512afe18e517784

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
<<<<<<< HEAD
    $fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    $course = isset($_POST["course"]) ? $_POST["course"] : '';
    $institution = isset($_POST["institution"]) ? $_POST["institution"] : '';

    // Insert data into the database
    $sql = "INSERT INTO students (fullname, email, password, course, institution) VALUES ('$fullname', '$email', '$password', '$course', '$institution')";
=======
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $course = $_POST["course"];
    $institution = $_POST["institution"];

    // Insert data into the database
    $sql = "INSERT INTO users (fullname, email, password, course, institution) VALUES ('$fullname', '$email', '$password', '$course', '$institution')";
>>>>>>> a88fea83ac0e8e13f6a29ca10512afe18e517784

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
<<<<<<< HEAD
=======

>>>>>>> a88fea83ac0e8e13f6a29ca10512afe18e517784
