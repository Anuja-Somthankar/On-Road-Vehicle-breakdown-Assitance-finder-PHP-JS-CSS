<?php
    require('database.php');
    session_start();
  $sql = "DELETE FROM mechanics WHERE owner = '".$_GET['owner']."'";
  if (mysqli_query($con, $sql)) {
  
    echo "<center><h3><script>alert('Deleted!');</script></h3></center>";
    echo "<script>setTimeout(\"location.href = 'viewmechanics.php';\",1500);</script>";}
  ?>