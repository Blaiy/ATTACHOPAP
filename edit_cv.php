<?php
include 'connect.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["sid"])){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $about = $_POST["about"];
        $skills = $_POST["skills"];
        $hobbies_interests = $_POST["hobbies_interests"];
        $projects = $_POST["projects"];
        $aspirations = $_POST["aspirations"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"];
        $linkedin = $_POST["linkedin"];

        $updateSql = "UPDATE cv_details SET about = COALESCE(NULLIF(?, ''), about), 
                                           skills = COALESCE(NULLIF(?, ''), skills), 
                                           hobbies_interests = COALESCE(NULLIF(?, ''), hobbies_interests), 
                                           projects = COALESCE(NULLIF(?, ''), projects), 
                                           aspirations = COALESCE(NULLIF(?, ''), aspirations), 
                                           phone_number = COALESCE(NULLIF(?, ''), phone_number), 
                                           email = COALESCE(NULLIF(?, ''), email), 
                                           linkedin = COALESCE(NULLIF(?, ''), linkedin)
                      WHERE user_id = ?";
        
        if ($stmtUpdate = $conn->prepare($updateSql)) {
            $stmtUpdate->bind_param("ssssssssi", $about, $skills, $hobbies_interests, $projects, $aspirations, $phone_number, $email, $linkedin, $_SESSION["sid"]);
            $stmtUpdate->execute();
            $stmtUpdate->close();

            $_SESSION["success_message"] = "CV details updated successfully.";
        } else {
            $_SESSION["error_message"] = "Error preparing update statement: " . $conn->error;
        }

        $conn->close();

        header("Location: edit_cv.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit CV</title>
    <style>
    body {
        font-family: 'Arial', sans-serif; 
        background-color: #F2F4FF;         
        }

        .form-container {
        width: 70%; 
        margin: 30px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); 
        }

        h1 {
        color: #2ECC71; 
        text-align: center;
        margin-bottom: 20px;
        }

        label {
        font-weight: bold;
        color: #333;          
        }

        textarea,
        input[type="text"] {
        width: 100%; 
        padding: 10px;
        margin-bottom: 15px;
        border: 2px solid #1870E7;
        border-radius: 5px;
        box-sizing: border-box; 
        }

        textarea,
        input[type="email"] {
        width: 100%; 
        padding: 10px;
        margin-bottom: 15px;
        border: 2px solid #1870E7;
        border-radius: 5px;
        box-sizing: border-box; 
        }


        input[type="submit"] {
        background-color:  #2ECC71; 
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
        background-color: #FFD446;
        }

        #aboutFeedback {
        display: block;
        margin-top: 5px;
        font-size: 14px;
        }

        #aboutFeedback.valid {
        color: green;
        }

        #aboutFeedback.invalid {
        color: red;
        }
</style>

</head>
<body>
    <h1>Edit CV</h1>
    <div class="form-container">
    <?php
        if (isset($_SESSION["error_message"])) {
            echo '<div style="color: red;">' . $_SESSION["error_message"] . '</div>';
            unset($_SESSION["error_message"]);
        }

        if (isset($_SESSION["success_message"])) {
            echo '<div style="color: green;">' . $_SESSION["success_message"] . '</div>';
            unset($_SESSION["success_message"]);
        }

        $sql = "SELECT * FROM cv_details WHERE user_id = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("i", $_SESSION["sid"]);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($row = $result->fetch_assoc()) {
                $about = $row["about"];
                $skills = $row["skills"];
                $hobbies_interests = $row["hobbies_interests"];
                $projects = $row["projects"];
                $aspirations = $row["aspirations"];
                $phone_number = $row["phone_number"];
                $email = $row["email"];
                $linkedin = $row["linkedin"];
            }
            $stmt->close();
        }
        ?>
        <form method="post" action="edit_cv.php">
            <label for="about">About You (20-50 words)</label>
            <textarea id="about" name="about" rows="4"><?php echo $about; ?></textarea>
            <span id="aboutFeedback"></span>

            <label for="skills">Skills</label><br>
            <textarea id="skills" name="skills" rows="4" cols="50" placeholder="e.g., Communication, Problem Solving, Leadership"><?php echo $skills; ?></textarea><br><br>

            <label for="hobbies_interests">Hobbies & Interests</label><br>
            <textarea id="hobbies_interests" name="hobbies_interests" rows="4" cols="50" placeholder="e.g., Photography, Traveling, Cooking"><?php echo $hobbies_interests; ?></textarea><br><br>

            <label for="projects">Projects</label><br>
            <textarea id="projects" name="projects" rows="4" cols="50"><?php echo $projects; ?></textarea><br><br>

            <label for="aspirations">Aspirations</label><br>
            <textarea id="aspirations" name="aspirations" rows="4" cols="50"><?php echo $aspirations; ?></textarea><br><br>

            <label for="phone">Phone Number</label><br>
            <input type="text" id="phone_number" name="phone_number" placeholder="<?php echo $phone_number; ?>"<?php echo $about; ?>><br><br>

            <label for="phone">Email</label><br>
            <input type="email" id="email" name="email" placeholder="<?php echo $email; ?>"><br><br>

            <label for="phone">LinkedIn</label><br>
            <input type="text" id="linkedin" name="linkedin" placeholder="<?php echo $linkedin; ?>"><br><br>

            <input type="submit" value="Submit" disabled>
        </form>
    </div>

    <script>
        const aboutTextArea = document.getElementById('about');
const aboutFeedback = document.getElementById('aboutFeedback');
const submitButton = document.querySelector('input[type="submit"]'); // Get submit button

const validateAboutSection = () => {
  const wordCount = aboutTextArea.value.trim().split(/\s+/).length;
  const isValid = wordCount >= 20 && wordCount <= 50;

  aboutFeedback.textContent = `Word Count: ${wordCount}`;
  aboutFeedback.classList.toggle('valid', isValid);
  aboutFeedback.classList.toggle('invalid', !isValid);

  submitButton.disabled = !isValid; 
};

aboutTextArea.addEventListener('input', validateAboutSection);
    </script>


</body>
</html>
