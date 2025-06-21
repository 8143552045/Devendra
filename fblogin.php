<?php
session_start();
$connection = mysqli_connect('localhost','root','','facebook');
if($connection){
    echo "Connection successful";

   $email = $_POST['email'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
   $result=mysqli_query($connection, $sql);

   if(mysqli_num_rows($result)>0){
    echo "Login successful";
    $_SESSION["user_loggedin"]=true;
    header("Location: fbaccount.php");
    exit(); // Always call exit after header redirect
   }else{
    echo "Login failed";
   }
} else {
    echo "Connection failed: " . mysqli_connect_error();

}

?>