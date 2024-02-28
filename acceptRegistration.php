<?php
include 'authorizeAdmin.php';
if(isset($_GET['id'])){
    $aid = $_GET['id'];  //application id
    include 'connect.php';
    
    // Update the status in the seeker table
    $sql = "UPDATE seeker SET status='Accepted' WHERE id='$aid';";
    $result = $conn->query($sql);

    // Get the user's email from the seeker table
    $getEmailSql = "SELECT email, name FROM seeker WHERE id='$aid';";
    $emailResult = $conn->query($getEmailSql);
    if ($emailResult->num_rows > 0) {
        $row = $emailResult->fetch_assoc();
        $userEmail = $row['email'];
        $studentName = $row['name'];
        $companyName = "ATTACHOPAP";

        // Send email notification
        $from = 'barryykriss@gmail.com';
        $subject = 'Application Accepted';
        $message = '<p>Dear ' . $studentName . ',<br><br>Congratulations. Your application to ' . $companyName . ' has been accepted. We are excited to have you on board. We are here to make your attachment application easier. Goodluck in your applications.<br><br>Sincerely,<br>The ' . $companyName . ' Team</p>';
        $headers = 'From: ' . $from . "\r\n" .
                   'Reply-To: ' . $from . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" .
                   'MIME-Version: 1.0' . "\r\n" .
                   'Content-Type: text/html; charset=UTF-8' . "\r\n";
        mail($userEmail, $subject, $message, $headers);

        // Redirect to the view applicants page
        header('location: ViewApplicantsAdmin.php');
    } else {
        echo "Error: User email not found.";
    }
} else {     
    header('location: index.php?msg=dup');
}
die();
?>
