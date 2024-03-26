<?php
include 'authorizeAdmin.php';
if(isset($_GET['id']) && isset($_GET['type'])){
    $aid = $_GET['id']; 
    $type = $_GET['type'];  
    include 'connect.php';
    
    if($type == 'seeker'){
        $sql = "UPDATE seeker SET status='Rejected' WHERE id='$aid';";
        $redirect = 'ViewApplicantsAdmin.php';
        $getEmailSql = "SELECT email, name FROM seeker WHERE id='$aid';";
    } elseif ($type == 'employer'){
        $sql = "UPDATE employer SET status='Rejected' WHERE id='$aid';";
        $redirect = 'ViewEmployersAdmin.php';
        $getEmailSql = "SELECT email, name FROM employer WHERE id='$aid';";
    } else {
        header('location: index.php?msg=invalid');
        die();
    }

    $result = $conn->query($sql);

    $emailResult = $conn->query($getEmailSql);
    if ($emailResult->num_rows > 0) {
        $row = $emailResult->fetch_assoc();
        $userEmail = $row['email'];
        $userName = $row['name'];
        $companyName = "ATTACHOPAP";

        $from = 'barryykriss@gmail.com';
        $subject = 'Application Rejected';
        $message = '<p>Dear ' . $userName . ',<br><br>We regret to inform you that your application to ' . $companyName . ' has been rejected. The documents that you submitted do not meet the requirements to join ' . $companyName . '.<br><br>Sincerely,<br>The ' . $companyName . ' Team</p>';
        $headers = 'From: ' . $from . "\r\n" .
                   'Reply-To: ' . $from . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" .
                   'MIME-Version: 1.0' . "\r\n" .
                   'Content-Type: text/html; charset=UTF-8' . "\r\n";
        mail($userEmail, $subject, $message, $headers);

        header('location: ' . $redirect);
    } else {
        echo "Error: User email not found.";
    }
} else {     
    header('location: index.php?msg=dup');
}
die();
?>
