<?php 
session_start();
if(isset($_SESSION['email'])){
session_destroy();}

header("location:signin.html");
?>