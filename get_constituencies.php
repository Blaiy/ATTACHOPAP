<?php
// Assuming you have a database connection established
include 'connect.php';

if (isset($_GET['county_id'])) {
    $countyId = $_GET['county_id'];
    
    // Prepare and execute a query to fetch constituencies for the given county
    $stmt = $conn->prepare("SELECT * FROM regions WHERE county_id = ? ORDER BY constituency_name");
    $stmt->bind_param('i', $countyId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Fetch the results into an associative array
    $constituencies = $result->fetch_all(MYSQLI_ASSOC);
    
    // Output the constituencies as JSON
    echo json_encode($constituencies);
} else {
    // Handle the case where no county ID is provided
    echo json_encode([]);
}
?>
