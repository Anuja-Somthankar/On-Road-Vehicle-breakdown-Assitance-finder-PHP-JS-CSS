<html>
<head>
    <title> Admin Page </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
    <link rel="stylesheet" type="text/css" href="style2.css"> 
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
  th1{
    border: 3px solid #dddddd;
    background-color: lightblue;
    text-align: center;
    padding: 8px;
  }
  tr1{
    background-color: white;

  }
  .button {
  background-color: #4CAF50; /* Green */
  border: 1pxblack;
  color: white;
  margin-left: 92.9%;
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
<a href="homeadmin.html">Home</a>
<a href="adminpage.php">Approve</a>
<a href="viewmechanics.php">Review</a>
<a href="logoutadmin.php" >Log out</a>

</div>
<div class="w3-container w3-black" >
<span style="font-size:45px;cursor:pointer" onclick="openNav()">&#9776; </span>
<span class="w3-text-with" style="font-size:45px"><b>CarSeva</b></span>
</div>
</div>
</div>
<?php
$i=1;
?>
<br><br><br><br>
<form action='process.php' method='post'>
<div class="w3-container" style='margin-left: 12.5%; margin-right: 12.5%;'>
<table class="w3-table-all">
    <tr class="w3-light-grey">
    <th>Owner</th>
    <th>Company</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Approved</th>
    <th>Update</th>
    </tr>
    <?php
    require ('database.php');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    }
    $sql = "SELECT owner,company, phone, link, approved FROM mechanics where approved=0";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) { //feteches associative array
    echo "<tr><td>" . $row["owner"]. "</td><td>" . $row["company"] . "</td><td>". $row["phone"]. "</td><td>". $row["link"]."</td><td>".$row["approved"]."</td><td>"
    ."<input type='checkbox' name='check[$i]' value='".$row['owner']."'/>".'</td></tr>';
    $i++;
    }
    echo "</table>";
    echo "<br>";
    echo "<input class='button' type='submit' name='approve' value='Approve'/>";
    echo "</form>";

    } 
    $con->close();
    ?>
</table>
</div>
<br>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>
</html>