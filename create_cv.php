<?php
include 'connect.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["sid"])){
    $about = $skills = $hobbies_interests = $projects = $aspirations = $phone_number = $email = $linkedin = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $about = $_POST["about"];
        $skills = $_POST["skills"];
        $hobbies_interests = $_POST["hobbies_interests"];
        $projects = $_POST["projects"];
        $aspirations = $_POST["aspirations"];
        $phone_number = $_POST["phone_number"];
        $email = $_POST["email"];
        $linkedin = $_POST["linkedin"];

        $sql = "INSERT INTO cv_details (user_id, about, skills, hobbies_interests, projects, aspirations, phone_number, email, linkedin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssssssss", $_SESSION["sid"], $about, $skills, $hobbies_interests, $projects, $aspirations, $phone_number, $email, $linkedin);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Set cv_status to 1 in the seeker table
                $updateSql = "UPDATE seeker SET cv_status = 1 WHERE id = ?";
                if ($stmtUpdate = $conn->prepare($updateSql)) {
                    $stmtUpdate->bind_param("i", $_SESSION["sid"]);
                    $stmtUpdate->execute();
                    $stmtUpdate->close();
                } else {
                    $_SESSION["error_message"] = "Error preparing update statement: " . $conn->error;
                }

                $_SESSION["success_message"] = "CV details added successfully.";
            } else {
                $_SESSION["error_message"] = "Error inserting CV details: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            $_SESSION["error_message"] = "Error preparing statement: " . $conn->error;
        }

        // Close connection
        $conn->close();

        // Redirect back to the form
        header("Location: edit_cv.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Create CV</title>
<link rel="icon" href="img/jobsConnect.svg" type="image/x-icon">
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
    <h1>Create Your CV</h1>
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
        ?>
        <form method="post" action="create_cv.php">
        <label for="about">About You (20-50 words):</label>
        <textarea id="about" name="about" rows="4"></textarea>
        <span id="aboutFeedback"></span>

            <label for="skills">Skills</label><br>
            <textarea id="skills" name="skills" rows="4" cols="50" placeholder="e.g., Communication, Problem Solving, Leadership"></textarea><br><br>

            <label for="hobbies_interests">hobbies_interests and Interests</label><br>
            <textarea id="hobbies_interests" name="hobbies_interests" rows="4" cols="50" placeholder="e.g., Photography, Traveling, Cooking"></textarea><br><br>

            <label for="projects">Projects</label><br>
            <textarea id="projects" name="projects" rows="4" cols="50"></textarea><br><br>

            <label for="aspirations">Aspirations</label><br>
            <textarea id="aspirations" name="aspirations" rows="4" cols="50"></textarea><br><br>

            <label for="phone">Phone Number</label><br>
            <input type="text" id="phone_number" name="phone_number" placeholder="Your Phone Number"><br><br>

            <label for="phone">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Your Primary Email"><br><br>

            <label for="phone">LinkedIn</label><br>
            <input type="text" id="linkedin" name="linkedin" placeholder="Make sure to copy the link from your LinkedIn profile"><br><br>

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
