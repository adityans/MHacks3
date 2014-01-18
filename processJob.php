<?php
 require_once "head.php";

 $title = $_POST['title'];
 $price = $_POST['price'];
 $date = $_POST['date'];
 $description = $_POST['description'];

$sql = "INSERT INTO `posts`(`Title`, `description`, `price`, `Date`) VALUES ('$title','$description','$price', '$date') ";

mysql_query($sql) or die("error");

header("Location: listings.php");

?>