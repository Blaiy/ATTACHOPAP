<?php include 'authorizeSeeker.php'; ?>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">
    <title> Account | Job Seeker</title>

    <!--<link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">-->
    <!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css">-->
    <!--<link href="css/Animate.css" rel="stylesheet" type="text/css">-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <!--<link href="css/animate.min.css" rel="stylesheet" type="text/css">-->

    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@200&display=swap" rel="stylesheet">

<!--<body onload="logoBeat()" style="font-family: 'Sora', sans-serif;">-->

    <?php
    include 'navBar.php';
    include 'signinEmployerModals.php';
    ?>
    <!-- Main Container -->
    <div class="container-fluid" style="background-color: #1F5C7A;">
        <?php
        include 'connect.php';
        $sid = $_SESSION["sid"];
        $sqlE = "select * from seeker where id = '$sid' ;";



        $resultE = $conn->query($sqlE);
        if ($resultE->num_rows > 0) {
            // output data of each row
            if ($rowE = $resultE->fetch_assoc()) {
                $name =  $rowE["name"];
                $email =  $rowE["email"];
                $university =  $rowE["university"];
                $course =  $rowE["course"];
            }
        }

        ?>


        <aside class="profile-card">
        <header>
            <!-- here’s the avatar -->
            <a target="_blank" href="#">
            <img src="img/1.jpg" class="hoverZoomLink">
            </a>

            <!-- the username -->
            <h1 style="font-size: 20px;">
                <?php echo $name; ?>
            </h1>

            <!-- and role or location -->
            <h2 style="font-size: 16px;">
                <?php echo $email; ?>
            </h2>

        </header>

        <!-- bit of a bio; who are you? -->
        <div class="profile-bio">

            <h1 style="font-size: 20px;">
            <?php echo $university; ?>
            <h1>
            <h2 style="font-size: 16px;">
            <?php echo $course; ?>
            <h2>

        </div>

        <!-- some social links to show off -->
        <ul class="profile-social-links">
            <li>
            <a target="_blank" href="https://www.facebook.com/creativedonut">
                <i class="fa fa-facebook"></i>
            </a>
            </li>
            <li>
            <a target="_blank" href="https://twitter.com/dropyourbass">
                <i class="fa fa-twitter"></i>
            </a>
            </li>
            <li>
            <a target="_blank" href="https://github.com/vipulsaxena">
                <i class="fa fa-github"></i>
            </a>
            </li>
            <li>
            <a target="_blank" href="https://www.behance.net/vipulsaxena">
            
                <i class="fa fa-behance"></i>
            </a>
            </li>
        </ul>
        </aside>
    </div>

    <!--first row -->

    <script src="js/tilt.jquery.min.js"></script>
    <script src="js/signinModal.js"></script>
</body>

</html>