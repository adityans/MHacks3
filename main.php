<?php

require_once "venmo.php";
require_once "head.php";





$code = $_REQUEST['code'];



$dev = new Venmo;
$auth = $dev->getAccess($code);
$serverAuth = json_decode($auth, true);
$_SESSION['token'] = $serverAuth["access_token"];
$token = $_SESSION['token'];


$userData = $dev->getUserData($token);
$data = json_decode($userData, true);

$userId = $data['data']['user']['id'];


$idQuery = "SELECT userId FROM users WHERE userId='$userId'";


$idReturn = mysql_query($idQuery);


if(!(mysql_num_rows($idReturn)))
{
	header("Location: enterEmail.php");
	die();
}



$_SESSION['firstName'] = $data['data']['user']['first_name'];
$_SESSION['lastName'] = $data['data']['user']['firstName'];
$_SESSION['userId'] = $userId;
$_SESSION['email'] = $data['data']['user']['email'];

$updateToken = "UPDATE users SET accessToken=$token WHERE userId = '$userId'";

mysql_query($updateToken) or die("update failed");


header("Location: listings.php");



?>
