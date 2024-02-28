<?php
include 'authorizeEmployer.php';

if(isset($_GET['id'])){
    $aid = $_GET['id'];  // application id
    include 'connect.php';
    
    // Update the status in the jobsapplied table
    $sql = "UPDATE jobsapplied SET status='Rejected' WHERE id='$aid';";
    $result = $conn->query($sql);

    // Get the user's email, name, and job details
    $getEmailSql = "SELECT s.email, s.name, p.name AS job_name, e.name AS employer_name 
                    FROM seeker s 
                    INNER JOIN jobsapplied j ON s.id = j.sid 
                    INNER JOIN post p ON j.pid = p.id 
                    INNER JOIN employer e ON p.eid = e.id 
                    WHERE j.id='$aid';";
    $emailResult = $conn->query($getEmailSql);
    if ($emailResult->num_rows > 0) {
        $row = $emailResult->fetch_assoc();
        $userEmail = $row['email'];
        $studentName = $row['name'];
        $jobName = $row['job_name'];
        $employerName = $row['employer_name'];

        // Send email notification
        $from = 'barryykriss@gmail.com';
        $subject = 'Application Rejected';
        $message = '<p>Dear ' . $studentName . ',</p>';
        $message .= '<p>We regret to inform you that your application for the job "'.$jobName.'" with employer "'.$employerName.'" has been rejected. We appreciate your interest and wish you the best in your future endeavors.</p>';
        $headers = 'From: ' . $from . "\r\n" .
                   'Reply-To: ' . $from . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" .
                   'MIME-Version: 1.0' . "\r\n" .
                   'Content-Type: text/html; charset=UTF-8' . "\r\n";
        mail($userEmail, $subject, $message, $headers);

        // Redirect to the view applicants page
        header('location: ViewApplicants.php');
    } else {
        echo "Error: User email not found.";
    }
} else {     
    header('location: index.php?msg=dup');
}
die();
