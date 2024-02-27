<?php


// Create connection

include 'authorizeEmployer.php';
$id = 0;
$name = $category = $location = $compensation = $industry = $desc = $role = $eType = $status = $msg = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'GET') {
    include 'connect.php';
    if (isset($_GET['update']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "select * from post where eid=$eid and id=$id";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $category = $row['category'];
            $location = $row['location'];
            $compensation = $row['compensation'];
            $industry = $row['industry'];
            $desc = $row['desc'];
            $role = $row['role'];
            $status = $row['status'];
        }
    }

    if (isset($_POST['submitPost'])) {

        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $location = $_POST['location'];
        $compensation = $_POST['compensation'];
        $industry = $_POST['industry'];
        $desc = $_POST['desc'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $county = $_POST['county'];
        $constituency = $_POST['constituency'];


        if ($id > 0) {
            $sql = "Update `post` set `date`=CURRENT_DATE(),"
                . "`name`='$name', "
                . "`category`='$category', "
                . "`location`='$location', "
                . "`desc`='$desc', "
                . "`compensation`='".serialize($compensation)."', "
                . "`industry`='$industry', "
                . "`role`='$role', "
                . "`status`= '$status' "
                . "`county`='$county', "
                . "`constituency`='$constituency' "
                . "where id=$id and eid=$eid;";
        } else {
            $sql = "INSERT INTO `post` (`id`, `date`, `eid`, `name`, `category`, `location`, `desc`, `compensation`, `industry`, `role`, `status`, `county`, `constituency`) "
                . "VALUES (NULL, CURRENT_DATE(), '$eid', '$name', '$category', '$location', '$desc', '".serialize($compensation)."', '$industry', '$role', '$status', '$county', '$constituency');";
        }

        if ($conn->query($sql) === TRUE) {
            if ($_GET['update']) {
                header('location: employerAccount.php');
            } else {
                $msg = "New Post has been created successfully";
            }
        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$stmt = $conn->prepare("SELECT * FROM regions GROUP BY county_id ORDER BY county_name");
$stmt->execute();
$result = $stmt->get_result();
$counties = $result->fetch_all(MYSQLI_ASSOC);

$selectedCounty = isset($_POST['county']) ? $_POST['county'] : (isset($_GET['county']) ? $_GET['county'] : null);

$stmt = $conn->prepare("SELECT * FROM regions WHERE county_name = ?");
$stmt->bind_param("s", $selectedCounty);
$stmt->execute();
$result = $stmt->get_result();
$constituencies = $result->fetch_all(MYSQLI_ASSOC);

?>


<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">
    <title> Post A Job | Employer</title>

    <link href="css/simpleGridTemplate.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/Animate.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/Animate.css" rel="stylesheet" type="text/css">
    <link href="css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kodchasan" rel="stylesheet">
    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@200&display=swap" rel="stylesheet">


    <style>
        .pc {
            animation-name: pc;
            animation-duration: 3s;
            animation-iteration-count: infinite;
            animation-timing-function: ease-in-out;
            margin-left: 30px;
            margin-top: 5px;
        }

        @keyframes pc {
            0% {
                transform: translate(0, 0px);
            }

            50% {
                transform: translate(0, 15px);
            }

            100% {
                transform: translate(0, -0px);
            }
        }

        .pstjb {
            width: 400px;
        }

        .bbb {
            padding-top: 30px;
        }
    </style>

<body onload="logoBeat()" style="font-family: 'Sora', sans-serif;">

    <?php
    include 'navBar.php';

    ?>
    <!-- Main Container -->
    <div class="container-fluid" style="background-color: #e9c46a;">
        <!--background-image: url('img/4.png');-->
        <?php
        include 'connect.php';
        $eid = $_SESSION["eid"];
        $sqlE = "select * from employer where id = '$eid' ;";



        $resultE = $conn->query($sqlE);
        if ($resultE->num_rows > 0) {
            // output data of each row
            if ($rowE = $resultE->fetch_assoc()) {
                $ename =  $rowE["name"];
                $email =  $rowE["email"];
            }
        }


        ?>


        <div class="hero">

            <h3 class="pc" style="padding-top: 120px; font-size: 90px; text-align: center;"><b>POST AN OPPORTUNITY</b></h3>

            <div class="container contact-form" style=" background-color: #2a9d8f; width: 700px; height: 1100px; box-shadow: 0px 0px 25px #1e1e1e; 
                 align-items: center; justify-content: center; display: flex; padding: 0px; ">
                <form method="post">

                    <div class="row">

                        <div class="col">


                            <input type='hidden' value="<?php echo $id; ?>" name='id' />

                            <div class="form-group">
                                <label for="name">Attachment Opportunity</label>
                                <input type="text" name="name" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Enter Attachment Opportunity" value="<?php echo $name; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="category">Attachment Category</label>
                                <select type="text" name="category" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Category"> <?php include 'categoryOptions.php'; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="location">Attachment Location</label>
                                <input type="text" name="location" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Enter Location" value="<?php echo $location; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="county">County:</label>
                                <select id="county" name="county" class="form-control" onchange="fetchConstituencies()">
                                    <option value="">Select County</option>
                                    <?php foreach ($counties as $county): ?>
                                        <option value="<?= $county['county_id'] ?>"><?= $county['county_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="constituency">Constituency:</label>
                                <select id="constituency" name="constituency" class="form-control">
                                    <option value="">Select Constituency</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="compensation">Compensation (Select all that apply)</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compensation[]" id="compensationUnpaid" value="Unpaid">
                                    <label class="form-check-label" for="compensationUnpaid">
                                    Unpaid (Focuses on Skill Development and Experience)
                                    
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compensation[]" id="compensationStipend" value="Stipend">
                                    <label class="form-check-label" for="compensationStipend">
                                    Stipend (To cover some basic expenses)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compensation[]" id="compensationTransport" value="Transport">
                                    <label class="form-check-label" for="compensationTransport">
                                    Transportation Allowance (To cover commuting costs)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compensation[]" id="compensationMeal" value="Meal">
                                    <label class="form-check-label" for="compensationMeal">
                                    Meal Allowance (To cover meal expenses)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compensation[]" id="compensationSkill" value="Skill">
                                    <label class="form-check-label" for="compensationSkill">
                                    Skill Development (Gain valuable practical experience)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compensation[]" id="compensationCertificate" value="Certificate">
                                    <label class="form-check-label" for="compensationCertificate">
                                    Certificate of Completion (Upon successful program completion)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compensation[]" id="compensationNetworking" value="Networking">
                                    <label class="form-check-label" for="compensationNetworking">
                                    Networking Opportunities (Connect with professionals in the field)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="compensation[]" id="compensationJobOffer" value="JobOffer">
                                    <label class="form-check-label" for="compensationJobOffer">
                                    Potential Job Offer (Upon successful program completion)
                                    </label>
                                </div>
                                <small class="text-muted">**Please note:** We prioritize fair compensation practices and are working towards offering competitive salaries for attachment programs in the future. Currently, the program is unpaid, but we offer the options above to enhance your experience. We encourage you to reach out with any questions or concerns.</small>
                            </div>

                            <div class="form-group">
                                <label for="industry">Industry</label>
                                <select type="text" name="industry" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Industry"> <?php include 'industryOptions.php'; ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="desc">Attachment requirements</label>
                                <input type="text" name="desc" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Description" value="<?php echo $desc; ?>" />
                            </div>

                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" name="role" class="form-control" style="border-radius:0px; height: 50px;" placeholder="Enter Role" value="<?php echo $role; ?>" />
                            </div>


                            <div class="form-group">
                                <label for="eType">Status</label>
                                <select type="text" name="status" class="form-control" style="border-radius:0px; height: 50px;">
                                    <option>Open <?php if ($status == 'open') {
                                                        echo "checked='true'";
                                                    } ?> </option>
                                    <option>Close <?php if ($status == 'closed') {
                                                        echo "checked='true'";
                                                    } ?> </option>
                                </select>
                            </div>

                            <div class="form-group bbb">

                                <button type="submit" name="submitPost" class="btn" style="background-color: #001219; color: #e9d8a6;
                            box-shadow: none; border-radius: 0px; height: 50px; width: 500px;"> <b> POST A JOB </b> </button>

                                <!--display message-->
                                <div style="font-family: Sora; font-size: 15px; color: #ffd6a5; padding-top: 15px;">
                                    <b><?php echo $msg; ?></b>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <script>
            function fetchConstituencies() {
            var countyId = document.getElementById('county').value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_constituencies.php?county_id=' + countyId, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var constituencies = JSON.parse(xhr.responseText);
                    var constituencyDropdown = document.getElementById('constituency');
                    constituencyDropdown.innerHTML = '<option value="">Select Constituency</option>';
                    constituencies.forEach(function (constituency) {
                        var option = document.createElement('option');
                        option.value = constituency['constituency_name'];
                        option.textContent = constituency['constituency_name'];
                        constituencyDropdown.appendChild(option);
                    });
                } else {
                    console.log('Request failed.  Returned status of ' + xhr.status);
                }
            };
            xhr.send();
        }

        </script>


    <!--first row -->
    <script src="js/tilt.jquery.min.js"></script>
    <script src="js/signinModal.js"></script>
</body>

</html>