<?php
include 'connect.php';

$name = "";
$university = "";
$course = "";
$email = "";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["sid"])) {
    $sid = $_SESSION["sid"];

    $sql = "SELECT * FROM seeker WHERE id = '$sid'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $university = $row["university"];
        $course = $row["course"];
        $email = $row["email"];
        $status = $row["status"];

        if ($status == 1) {
            header('Location: update_cv.php');
            exit();
        }
    }
} else {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">

  <title>Student Account</title>

  <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/Animate.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="css/Animate.css" rel="stylesheet" type="text/css">
  <link href="css/animate.min.css" rel="stylesheet" type="text/css">


  <!--FONTS-->
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@200&display=swap" rel="stylesheet">
    
<link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .profile-card {
            width: 300px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-card header {
            text-align: center;
        }

        .profile-card header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .profile-card header h2 {
            font-size: 18px;
            color: #666;
        }

        .profile-card header .profile-photo {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        margin-bottom: 20px;
        border-radius: 50%;
        overflow: hidden;
        }

        .profile-card header .profile-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }

    </style>
</head>
<body>
    <div class="navbar-wrapper">
        <?php
            include 'navBar.php';
        ?>
    </div>
<aside class="profile-card">
    <header>
    <div class="profile-photo">
    <img src="img/1.jpg" alt="Profile Photo">
  </div>
        <h1><?php echo $name; ?></h1>
        <h1><?php echo $email; ?></h1>
        <h2><?php echo $university; ?></h2>
        <h2><?php echo $course; ?></h2>

    </header>

    <div class="profile-actions" style="text-align: center;">
    <a href="view_cv.php?user_id=<?php echo $sid; ?>" class="btn">
        <i class="bi bi-eye"></i> View CV 
    </a>
    <a href="create_cv.php" class="btn">
        <i class="bi bi-plus-circle"></i> Create CV 
    </a>
    <a href="edit_cv.php" class="btn">
        <i class="bi bi-pencil"></i> Update/Edit CV 
     </a>
</div>

</aside>
</body>
</html>
