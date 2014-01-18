<?php

require_once 'head.php';

$firstName = $_SESSION['firstName'];

echo "<h2>Welcome " . $firstName . "</h2>";

echo "<h3>Postings: </h3>";

$result = mysql_query("SELECT * FROM Posts");

while($row = mysqli_fetch_array($result))
  {
  	echo $row['title'];
  	echo "<br>";
  }




?>


<br /><a href = "postJob.php"> Post A Task </a>
<br /><a href = "logout.php">Log Out</a>