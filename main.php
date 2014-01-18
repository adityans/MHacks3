<?php

require_once "venmo.php";
require_once "head.php";





$token = $_REQUEST['access_token'];
$_SESSION['token'] = $token;


$dev = new Venmo;
$userData = $dev->getUserData($token);
$data = json_decode($userData, true);

$userId = $data['data']['user']['id'];

$idQuery = "SELECT userId FROM users WHERE userId = '$userId'";

$idReturn = mysql_query($idQuery);


if(!(mysql_num_rows($idReturn)))
{
	header("Location: enterEmail.php");
	die();
}


echo "welcome " . $data['data']['user']['username'];

header("Location: test.php");










?>