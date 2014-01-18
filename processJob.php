<?php
 require_once "head.php";

 $title = $_POST['title'];
 $price = $_POST['price'];
 $date = $_POST['date'];
 $description = $_POST['description'];



 $posterId = $_SESSION['userId'];

$sql = "INSERT INTO posts (Title, description, price, neededWhen, posterId, takenStatus, takenBy) 
		VALUES ('$title','$description','$price', '$date', '$posterId', 'false', '0')";

mysql_query($sql) or die("error");

header("Location: listings.php");


?>