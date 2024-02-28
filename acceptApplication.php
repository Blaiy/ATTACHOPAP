<?php
include 'authorizeEmployer.php'; // Make sure to include authorization for the employer
if(isset($_GET['id'])){
    $aid = $_GET['id'];  //application id
    include 'connect.php';
    
    // Update the status in the jobsapplied table
    $sql = "UPDATE jobsapplied SET status='Accepted' WHERE id='$aid';";
    $result = $conn->query($sql);

    // Get applicant's email and other details from the jobsapplied and post tables
    $getEmailSql = "SELECT s.email, s.name as student_name, e.name as employer_name, p.compensation, p.name as job_name, p.desc as job_description, p.location FROM jobsapplied j
                    INNER JOIN seeker s ON j.sid = s.id
                    INNER JOIN post p ON j.pid = p.id
                    INNER JOIN employer e ON p.eid = e.id
                    WHERE j.id='$aid';";
    $emailResult = $conn->query($getEmailSql);
    if ($emailResult->num_rows > 0) {
        $row = $emailResult->fetch_assoc();
        $userEmail = $row['email'];
        $studentName = $row['student_name'];
        $employerName = $row['employer_name']; // Get employer's name from the employers table
        $compensationSerialized = $row['compensation'];
        $compensationArray = unserialize($compensationSerialized);
        $compensation = implode(", ", $compensationArray);
        $jobName = $row['job_name'];
        $description = $row['job_description'];
        $location = $row['location'];

        // Send email notification
        $from = 'barryykriss@gmail.com'; // Update with your email
        $subject = 'Attachment Opportunity Accepted';
        $message = '<p>Dear ' . $studentName . ',<br><br>Congratulations! Your application for the attachment opportunity has been accepted by ' . $employerName . '. Here are the details:<br><br>
                    <strong>Attachment Opportunity:</strong> ' . $jobName . '<br>
                    <strong>Compensation:</strong> ' . $compensation . '<br>
                    <strong>Description:</strong> ' . $description . '<br>
                    <strong>Location:</strong> ' . $location . '<br><br>
                    We wish you a successful attachment period.<br><br>Best regards,<br>' . $employerName . '</p>';
        $headers = 'From: ' . $from . "\r\n" .
                   'Reply-To: ' . $from . "\r\n" .
                   'X-Mailer: PHP/' . phpversion() . "\r\n" .
                   'MIME-Version: 1.0' . "\r\n" .
                   'Content-Type: text/html; charset=UTF-8' . "\r\n";
        mail($userEmail, $subject, $message, $headers);

        // Redirect to the view applicants page
        header('location: ViewApplicants.php');
    } else {
        echo "Error: Applicant details not found.";
    }
} else {     
    header('location: index.php?msg=dup');
}
die();
?>
