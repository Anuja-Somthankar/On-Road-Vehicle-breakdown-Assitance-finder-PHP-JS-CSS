<?php
$con= mysqli_connect('localhost:3308','root','','Carseva')or die("Could not connect to mysql".mysqli_error($con));
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }
if(isset($_POST['approve'])){
                if(isset($_POST['check'])){
                    foreach ($_POST['check'] as $value){
                        $sql = "UPDATE mechanics SET approved = 1 WHERE owner = '$value'"; 
                        mysqli_query($con, $sql);
                    }
                    mysqli_close($con);
                }
            }
header('Location: adminpage.php');
?>