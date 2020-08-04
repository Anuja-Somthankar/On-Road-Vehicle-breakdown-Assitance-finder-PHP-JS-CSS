
	<?php
	require('database.php');
  $str = "SELECT * FROM mechanics WHERE owner = '".$_GET['owner']."'";
  $result = $con->query($str);
  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "latitude " . $row["latitude"]. " - longitude: " . $row["longitude"]. " " . $row["owner"]. "<br>";
    $latitude = $row['latitude'];
    $longitude = $row['longitude'];
  }
} else {
  echo "0 results";
}


	if (isset($_GET["owner"]))
	{

		//$latitude=$_POST['latitude'];
		//$longitude=$_POST['longitude'];
		?>


<iframe width="2000" height="500" frameborder="0" style="border:0" src="http://maps.google.com/maps?q=<?php echo $latitude;?>,<?php echo $longitude;?>&output=embed"></iframe>
		<?php
	}
	?>
	<!--<form method = 'POST'>
	<p>
		<input type="text" name='adress' placeholder="Enter address">
	</p>
	<input type='submit' name="submit_adress">
</form>
<form method="POST">
	<p>
		<input type="text" name="latitude" placeholder="Enter a latitude">
	</p>
	<p>
		<input type="text" name="longitude" placeholder="Enter a longitude">
	</p>
	<input type="submit" name="submit_coordinates">
</form>-->
