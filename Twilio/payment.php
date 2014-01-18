<?php
	
	require_once "venmo.php";

	$accessToken = $_REQUEST['access_token'];
	$cost = $_REQUEST['cost'];
	$serviceProvider = $_REQUEST['deliverId'];


	$pay = new Venmo;

	$pay->makePayment($accessToken, $serviceProvider, "payment on taskwal", $cost)

	echo "thank you for using taskwal!"