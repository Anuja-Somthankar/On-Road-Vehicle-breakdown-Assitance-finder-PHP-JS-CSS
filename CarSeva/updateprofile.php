<?php

include_once 'database.php';
session_start();
if(!(isset($_SESSION['email'])))
{
    header("location:signin.html");
}
else
{
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
   // echo $email;
    include_once 'database.php';
}
$name = $_POST['name'];
$vehicle = $_POST['vehicle'];
$plate = $_POST['plate'];
$phone = $_POST['phone'];
require ('database.php');
$sql = "UPDATE user set name='".$name."', vehicle='".$vehicle."', plate='".$plate."', phone='".$phone."' where email='".$email."'";
if(mysqli_query($con, $sql)){
    echo "<center><h3><script>alert('Updated!');</script></h3></center>";
    echo "<script>setTimeout(\"location.href = 'home.html';\",1500);</script>";    
}
else{
    echo "<center><h3><script>alert('Something went wrong!');</script></h3></center>";
    echo "<script>setTimeout(\"location.href = 'profile.html';\",1500);</script>";    
}

?>