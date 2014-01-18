<?php
 require_once "head.php";

 $title = $_POST['title'];
 $price = $_POST['price'];
 $date = $_POST['date'];
 $description = $_POST['description'];


 $posterId = $_SESSION['userId'];

$sql = "INSERT INTO posts VALUES ('$title','$description','$price', '$date', '$posterId', '1', 'false')";

mysql_query($sql) or die("error");

header("Location: listings.php");


?>