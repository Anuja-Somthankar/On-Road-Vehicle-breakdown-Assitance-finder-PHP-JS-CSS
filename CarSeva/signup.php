<?php
$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$vehicle = $_POST['vehicle'];
$plate = $_POST['plate'];
$phone = $_POST['phone'];

if(isset($_POST["submit"])){
 $host = "localhost:3308";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "carseva";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
 {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
} 
else 
{
	$str = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($conn,$str);
    if((mysqli_num_rows($result))==1) 
		{
         //header("Location: signin.html");
			echo "<center><h3><script>alert('Already Exists');</script></h3></center>";
         //alert('Already Exists');
        // header("refresh:5; Location: signin.html");
        echo "<script>setTimeout(\"location.href = 'signin.html';\",1500);</script>";
      }
      else{
     $INSERT = "INSERT Into user(name, email, password, vehicle, plate, phone) values(?, ?, ?, ?, ?, ?)";
     
   
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssd", $username, $email, $password, $vehicle, $plate, $phone );
      $stmt->execute();
    
     $stmt->close();
     $conn->close();
     echo "<center><h3><script>alert('Account created!');</script></h3></center>";
      //header( 'Location: signin.html' ) ;}
      echo "<script>setTimeout(\"location.href = 'signin.html';\",1500);</script>";
	//echo <<<HTML
//<a href="Evolve.html">Sign-in now!</a>
//HTML;
}
 }}
 ?>
