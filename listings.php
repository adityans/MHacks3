<?php

require_once 'head.php';

if(!isset($_SESSION['userId']))
{
	header('Location: index.html');
}


$firstName = $_SESSION['firstName'];

echo "<h2>Welcome " . $firstName . "</h2>";

?>


<br /><a href = "postJob.php">Post A Task</a>
<br /><a href = "logout.php">Log Out</a>

<?php

echo "<h3>Postings: </h3>";

$school = $_SESSION['school'];

$result = mysql_query("SELECT * FROM posts WHERE school='$school'");


$numEntries = mysql_num_rows($result);

while($numEntries > 0)
  {
  	$row = mysql_fetch_assoc($result);
  	echo "<span>" . $row['Title'] . "</span>";
  	echo "<br>";
  	$numEntries--;
  }




?>
