<?php
include '../connect.php'; // Include the file with your database connection

$countyId = $_GET['county_id'];
$stmt = $conn->prepare("SELECT * FROM constituencies WHERE county_id = ?");
$stmt->bind_param('i', $countyId); // Assuming 'i' is for integer, adjust if county_id is a different type
$stmt->execute();
$result = $stmt->get_result();
$constituencies = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($constituencies);
?>
