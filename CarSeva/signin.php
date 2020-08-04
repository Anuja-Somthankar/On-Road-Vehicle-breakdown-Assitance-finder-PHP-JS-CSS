<?php
	require('database.php');
	session_start();
	if(isset($_SESSION["email"]))
	{
		session_destroy();
	}
	

	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
		$pass = $_POST['password'];
	
		$email = mysqli_real_escape_string($con,$email);
		$pass = mysqli_real_escape_string($con,$pass);					
		$str = "SELECT * FROM user WHERE email='$email' and password='$pass'";
		$result = mysqli_query($con,$str);
		if((mysqli_num_rows($result))!=1) 
		{
			echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
			echo "<script>setTimeout(\"location.href = 'signin.html';\",1500);</script>";
			//header("refresh:0;url=login.php");
		}
		else
		{
			$_SESSION['logged']=$email;
			$row=mysqli_fetch_array($result);
			$_SESSION['name']=$row[0];
			$_SESSION['email']=$row[1];
			$_SESSION['password']=$row[2];
			$_SESSION['vehicle']=$row[3];
			$_SESSION['plate']=$row[4];
			$_SESSION['phone']=$row[5];
			header('location: home.html'); 					
		}
	}
?>

