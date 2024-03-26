<?php
include 'authorizeAdmin.php';
if(isset($_GET['id']) && isset($_GET['type'])){
    $aid = $_GET['id'];  //application id
    $type = $_GET['type'];  
    include 'connect.php';
    
    // Update the status in the respective table
    if($type == 'seeker') {
        $sql = "UPDATE seeker SET status='Accepted' WHERE id='$aid';";
        $redirect = 'ViewApplicantsAdmin.php';
    } elseif ($type == 'employer') {
        $sql = "UPDATE employer SET status='Accepted' WHERE id='$aid';";
        $redirect = 'ViewEmployersAdmin.php';
    } else {
        header('location: index.php?msg=dup');
        die();
    }

    $result = $conn->query($sql);

    // Get the user's email from the respective table
    if($type == 'seeker') {
        $getEmailSql = "SELECT email, name FROM seeker WHERE id='$aid';";
        $subject = 'Application Accepted';
        $message = '<p>Dear ' . $userName . ',<br><br>Congratulations. Your application has been accepted. We are excited to have you on board. Good luck in your endeavors.<br><br>Sincerely,<br>The Team</p>';
    } elseif ($type == 'employer') {
        $getEmailSql = "SELECT email, name FROM employer WHERE id='$aid';";
        $subject = 'Application Accepted';
        $message = '<p>Dear ' . $userName . ',<br><br>Congratulations. Your company\'s application has been accepted. We are excited to work with you. Good luck in your endeavors.<br><br>Sincerely,<br>The Team</p>';
    }

    $emailResult = $conn->query($getEmailSql);
    if ($emailResult->num_rows > 0) {
        $row = $emailResult->fetch_assoc();
        $userEmail = $row['email'];
        $userName = $row['name'];
        $companyName = "ATTACHOPAP";

        // Send email notification
        $from = 'barryykriss@gmail.com';
        $headers = 'From: ' . $from . "\r\n" .
                   'Reply-To: ' . $from . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" .
                   'MIME-Version: 1.0' . "\r\n" .
                   'Content-Type: text/html; charset=UTF-8' . "\r\n";
        mail($userEmail, $subject, $message, $headers);

        // Redirect to the respective view applicants page
        header('location: ' . $redirect);
        die();
    } else {
        echo "Error: User email not found.";
    }
} else {     
    header('location: index.php?msg=dup');
    die();
}
?>
