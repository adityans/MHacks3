<?php

require_once "venmo.php";
require_once "head.php";



if(isset($_REQUEST['code']))
{
	$code = $_REQUEST['code'];
}
else
{
	$code = -5;
}

$dev = new Venmo;

if($code != -5)
{
	
	$auth = $dev->getAccess($code);
	$serverAuth = json_decode($auth, true);
	$_SESSION['token'] = $serverAuth["access_token"];
}

$token = $_SESSION['token'];


$userData = $dev->getUserData($token);
$data = json_decode($userData, true);

$userId = $data['data']['user']['id'];


$idQuery = "SELECT school FROM users WHERE userId='$userId'";




$idReturn = mysql_query($idQuery);


$users = mysql_num_rows($idReturn);


if($users == 0)
{
	header("Location: enterEmail.php");
	die();
}
else
{

	$row = mysql_fetch_assoc($idReturn);

	$_SESSION['school'] = $row['school'];

	$_SESSION['firstName'] = $data['data']['user']['first_name'];
	$_SESSION['lastName'] = $data['data']['user']['firstName'];
	$_SESSION['userId'] = $userId;
	$_SESSION['email'] = $data['data']['user']['email'];

	$updateToken = "UPDATE users SET accessToken='$token' WHERE userId='$userId'";

	mysql_query($updateToken) or die("update failed");


	header("Location: listings.php");

}

?>
