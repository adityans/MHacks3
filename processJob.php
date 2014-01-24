<?php
 require_once "head.php";

 $title = $_POST['title'];
 $price = $_POST['price'];
 $date = $_POST['date'];
 $description = $_POST['description'];



 $posterId = $_SESSION['userId'];
 $school = $_SESSION['school'];

 $dateAdded = date('Y-m-d H:i:s', time());

$sql = "INSERT INTO posts (Title, description, price, neededWhen, posterId, takenStatus, takenBy, school, timeEntered) 
		VALUES ('$title','$description','$price', '$date', '$posterId', 'false', '0', '$school', '$dateAdded')";

mysql_query($sql) or die("error");

header("Location: listings.php");


?>