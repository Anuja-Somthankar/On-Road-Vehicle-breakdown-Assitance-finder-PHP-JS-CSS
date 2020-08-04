
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
     include_once 'database.php';
 }

$owner = $_POST['owner'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$link = $_POST['link'];
$latitude = floatval($_COOKIE['latitude']);
$longitude = floatval($_COOKIE['longitude']);
$sql = "INSERT INTO mechanics (latitude, longitude) VALUES ($latitude,$longitude)";

//if ($con->query($sql) === TRUE) {
//  echo $latitude."and".$longitude;
//} else {
//  echo "Error: " . $sql . "<br>" . $con->error;
//}
setcookie("latitude", "", time() - 3600);
setcookie("longitude", "", time() - 3600);

if(isset($_POST["submit"])){
 $host = "localhost:3308";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "carseva";
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error())
 {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error()); //same as mysqli->connect_error
}
else
{

     $INSERT = "INSERT Into mechanics(owner, company, phone, link,latitude,longitude) values(?, ?, ?, ?,?,?)";


      $stmt = $conn->prepare($INSERT);

      $stmt->bind_param("ssdsdd", $owner, $company, $phone, $link,$latitude,$longitude);
      $stmt->execute();

     $stmt->close();
     $conn->close();
     echo "<center><h3><script>alert('Submitted for approval!');</script></h3></center>";
      //header( 'Location: signin.html' ) ;}
      echo "<script>setTimeout(\"location.href = 'home.html';\",1500);</script>";
	//echo <<<HTML
//<a href="Evolve.html">Sign-in now!</a>
//HTML;
}}

 ?>
