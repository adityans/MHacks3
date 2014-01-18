<?php

require_once "venmo.php";
require_once "head.php";


if(isset($_POST['schoolChoice']) && isset($_POST['email']))
{
	$school = $_POST['schoolChoice'];
	$email = $_POST['email'];
}
else
{
	header('Location: enterEmail.php');
}

$token = $_SESSION['token'];
$dev = new Venmo;
$userData = $dev->getUserData($token);
$userInfo = json_decode($userData, true);


$firstName = $userInfo['data']['user']['first_name'];
$lastName = $userInfo['data']['user']['last_name'];
$userId = $userInfo['data']['user']['id'];


$addQuery = "INSERT INTO users VALUES ('$school', '$email', '$firstName', 
			'$lastName', '$userId')";

mysql_query($addQuery) or die("error");

header('Location: listings.php')


?>