<?php
require "db.php";
?>
<main>
    <h1>Reset Your Password</h1>
    <p>An email with the reset link has been sent to you.</p>
    <form action="includes/reset-request.php" method="post">
        <input type="text" name="email" placeholder="Enter Your Email Your Address">
        <button type="submit" name="reset-request-submit">Recover Password</button>
    </form>
</main>