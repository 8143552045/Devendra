<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'facebook');
if(isset($_SESSION["user_loggedin"]) && $_SESSION["user_loggedin"] === true) {
    echo "You Are Already Logged In";
    // Removed exit() to allow HTML to render
}   else{
    header("Location: fblogin.html");
}
?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <title>Facebook Account</title>
</head>
<body>
    <h1>Facebook Account</h1>
    <?php if(isset($_SESSION["user_loggedin"]) && $_SESSION["user_loggedin"] === true): ?>
        <a href="fblogout.php">Logout</a>
    <?php endif; ?>
</body>
</html>