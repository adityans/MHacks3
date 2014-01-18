<?php

require_once "venmo.php";





$token = $_REQUEST['access_token'];

$dev = new Venmo;
$dev->setToken();
$userData = $dev->getUserData();
$data = json_decode($userData, true);

$userId = $data['data']['user']['id'];

$idQuery = "SELECT userId WHERE userId = '$userId'";

$idReturn = mysql_query($idQuery);

if(!(mysql_num_rows($idReturn)))
{
	echo "<h2>Please Enter Your Email Address to Make an Account</h2>";
	include_once 'enterEmail.php';
	die();
}


echo "welcome " . $data['data']['user']['username'];

echo "making payment to Karan Vishwanathan";

$pay = $dev->makePayment($token, '248', 'test', '0.01');
print_r($pay);











?>