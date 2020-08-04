<?php
require("database.php");  
  
if(isset($_POST['admin_name']))
{  
    $admin_name=$_POST['admin_name'];  
    $admin_pass=$_POST['admin_pass'];  
    $admin_name = mysqli_real_escape_string($con,$admin_name); //ignoring "" mid ones and throughout
		$admin_pass = mysqli_real_escape_string($con,$admin_pass);				
    $admin_query="select * from admin where admin_name='$admin_name' AND admin_pass='$admin_pass'";  
  
    $run_query=mysqli_query($con,$admin_query);  
  
		if((mysqli_num_rows($run_query))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			echo "<script>setTimeout(\"location.href = 'signinadmin.html';\",1500);</script>";
			//header("refresh:0;url=login.php");
		}
    //else {echo"<script>alert('Admin Details are incorrect..!')</script>";}  
    else{ 
      $_SESSION['logged']=$admin_name;
			$row=mysqli_fetch_array($result);
			$_SESSION['admin_name']=$row[0];
			$_SESSION['admin_pass']=$row[1];
			
        header('Location: homeadmin.html');
    }
  
}  
  
?>  