<?php

$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$long=(isset($_GET['long']))?$_GET['long']:'';

require('database.php');
function twopoints_on_earth($latitudeFrom, $longitudeFrom,
        $latitudeTo,  $longitudeTo)
{
$long1 = deg2rad($longitudeFrom);
$long2 = deg2rad($longitudeTo);
$lat1 = deg2rad($latitudeFrom);
$lat2 = deg2rad($latitudeTo);

//Haversine Formula
$dlong = $long2 - $long1;
$dlati = $lat2 - $lat1;

$val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);

$res = 2 * asin(sqrt($val));

$radius = 3958.756;
//echo $res*$radius;
//echo '<br>';
return ($res*$radius);
}
?>
<html>
<head>
    <title> Admin Page </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    table1 {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 75%;
    margin-left: 12.5%;
    margin-right: 12.5%;
  }

  td1{
    border: 3px solid #dddddd;
    text-align: center;
    padding: 8px;
  }
  th1 {
    border: 3px solid #dddddd;
    background-color: lightgreen;
    text-align: center;
    padding: 8px;
  }
  tr1{
    background-color: white;

  }
  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  font: white;
  color: green;
  margin-left: 12.5%;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
body, html {
  height: 100%;
  font-family: "Tangerine", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("study.jpg");
  min-height: 100%;
}

.menu {
  display: none;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

  </style>
</head>
    <body>

<div class="w3-top">

  <div class=" w3-black">
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="home.html">Home</a>
  <a href="mechanics.php">Mechanics</a>
  <a href="regmech.html">Register your shop</a>
  <a href="profile.html">Update Profile</a>
  <a href="logout.php" >Log out</a>
</div>
<div class="w3-container w3-black" >
<span style="font-size:45px;cursor:pointer" onclick="openNav()">&#9776; </span>
<span class="w3-text-with" style="font-size:45px"><b>CarSeva</b></span>
</div>
</div>
</div>
<br><br><br><br>
<?php
$i=1;
?>
<div class="w3-container" style='margin-left: 12.5%; margin-right: 12.5%;'>
<table class="w3-table-all">
    <tr class="w3-light-grey">
    <th>Owner</th>
    <th>Company</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Map</th>
    </tr>
    <?php
    $sql = "SELECT * FROM mechanics";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    //echo $lat."and".$long;
    while($row = $result->fetch_assoc()) {
    $dist=twopoints_on_earth((double)$lat,(double)$long,(double)$row['latitude'],(double)$row['longitude']);
    $check[$row['owner']] = $dist;
    }
    }
   asort($check);
    $i=1;
    $keys=array();
    foreach($check as $x=>$value){
       $keys[$i]=$x;
      // echo $x;
      // echo '<br>';
     // echo $value;
      $i++;

    }
   // $ids = join("','",$keys);
    echo '<tr>';
    echo '<form  method="POST">';
    foreach ($check as $x=>$value){
    $sql = "SELECT * FROM mechanics WHERE owner='$x' and approved = 1";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            echo "<tr><td>" . $row["owner"]. "</td><td>" . $row["company"] . "</td><td>". $row["phone"]. "</td><td>". $row["link"].
            "</td><td><input  type='button' value = 'View' onclick='myFunction(\"".$row["owner"]."\");'/></td></tr>";
        }}}


    ?>    </form>
</table>
      </div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
function myFunction(name){

  window.location = "viewmap.php?owner="+name;
}
</script>

 </body>
</html>