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

$result = mysql_query("SELECT * FROM posts");

while($row = mysql_fetch_assoc($result))
  {
  	echo "<span>" . $row['title'] . "</span>";
  	echo "<br>";
  }




?>
