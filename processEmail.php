<?php

require_once "venmo.php"


if(isset($_POST['schoolChoice']) && isset($_POST['email']))
{
	$school = $_POST['schoolChoice'];
	$email = $_POST['email'];
}
else
{
	header('Location: enterEmail.php');
}


$dev = new Venmo;
$userData = $dev->getUserData();
$userInfo = $dev->accessData($userData);

$firstName = $userInfo['data']['user']['first_name'];
$lastName = $userInfo['data']['user']['last_name'];
$userId = $userInfo['data']['user']['id'];

$addQuery = "INSERT INTO helpMe VALUES ('$school', '$email', '$firstName', 
			'$lastName', '$userId'");

mysql_query($addQuery);


?>