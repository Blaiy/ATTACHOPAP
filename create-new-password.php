<main>
    <?php
        // Check if the selector and validator values exist in the $_GET array
        if (isset($_GET["selector"]) && isset($_GET["validator"])) {
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];

            // Check if the values are not empty and are hexadecimal
            if (!empty($selector) && !empty($validator) && ctype_xdigit($selector) && ctype_xdigit($validator)) {
                ?>
                <form action="includes/reset-password.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                    <input type="password" name="password" placeholder="Enter a new password">
                    <input type="password" name="password-repeat" placeholder="Repeat new password"> <!-- Corrected type attribute to "password" -->
                    <button type="submit" name="reset-password-submit">Reset Password</button>
                </form>
                <?php
            } else {
                echo "Could not validate your request. Invalid selector or validator.";
            }
        } else {
            echo "Could not validate your request. Required parameters are missing.";
        }
    ?>
</main>
