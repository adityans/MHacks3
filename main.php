<?php

require_once "venmo.php";
require_once "head.php";





$token = $_REQUEST['access_token'];
$_SESSION['token'] = $token;


$dev = new Venmo;
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

header("Location: listings.php");



?>