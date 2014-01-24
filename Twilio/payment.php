<?php
	
	require_once '../head.php';
	require_once "../venmo.php";

	$accessToken = $_GET['access_token'];
	$cost = $_GET['cost'];
	$serviceProvider = $_GET['deliverId'];
	$taskId = $_GET['taskId'];


	$resultTask = mysql_query("SELECT Title FROM posts WHERE taskId='$taskId'") or die("error result task");

	$numMatching = mysql_num_rows($resultTask);

	if(!$numMatching)
	{
		header('Location: ../index.html');
		die();
	}
	else
	{
		$pay = new Venmo;

		$status = $pay->makePayment($accessToken, $serviceProvider, "payment on taskwal", $cost);

		mysql_query("DELETE FROM posts WHERE taskId='$taskId'") or die("error delete");
		echo "thank you for using taskwal!";
	}	

?>