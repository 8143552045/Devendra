<?php
$connection = mysqli_connect('localhost','root','','facebook');
if($connection){
    // Connection successful - no need to echo as it might interfere with redirect
    
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['sex'];
    
    // Combine date parts (you need to add these to your form submission)
    $day = $_POST['birthday_day'];
    $month = $_POST['birthday_month'];
    $year = $_POST['birthday_year'];
    $dob = "$year-$month-$day"; // Format as YYYY-MM-DD for MySQL
    
    // SQL query (still vulnerable to SQL injection - you'll learn about prevention later)
    $sql = "INSERT INTO users (firstname, lastname, email, password, gender, dob) 
            VALUES ('$firstname', '$lastname', '$email', '$password', '$gender', '$dob')";
    
    $result = mysqli_query($connection, $sql);
    
    if($result){
        // Signup successful - redirect to login
        header("Location: fblogin.html");
        exit(); // Always call exit after header redirect
    } else {
        echo "Signup failed: " . mysqli_error($connection);
    }
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
?>