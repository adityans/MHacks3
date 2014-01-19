<?php
require_once '../head.php';
require_once('Services/Twilio.php');
$sid = "AC47de053c49c1997a0219339dd2ef4a63";
$token = "9db18cc7814409c5f236341fb9e5fd17";

if(isset($_SESSION['userId']))
{
	$deliverId = $_SESSION['userId'];
}
else
{
	header('Location: index.html');
	die();
}



if (isset($_GET['taskId'])) 
{
	$task_Id = $_GET['taskId'];
}
else
{
	header('Location: listings.php');
	die();
}

$resultTask = mysql_query("SELECT * FROM posts WHERE taskId='$task_Id'");
$rowTask = mysql_fetch_assoc($resultTask);

$receiverId = $rowTask['posterId'];
$cost = $rowTask['price'];
$description = $rowTask['description'];

mysql_query("UPDATE posts SET takenStatus=1 WHERE taskId='$task_Id'") or die("error taken status");

mysql_query("UPDATE posts SET takenBy='$deliverId' WHERE taskId='$task_Id'") or die("error taken by");



$resultRecip = mysql_query("SELECT phoneNumber, accessToken FROM users WHERE userId='$receiverId'");

$rowReceiver = mysql_fetch_assoc($resultRecip);




$resultDeliver = mysql_query("SELECT firstName, lastName FROM users WHERE userId='$deliverId'");
$rowDeliver = mysql_fetch_assoc($resultDeliver);





$recipientNumber =  $rowReceiver['phoneNumber'];//fill in with poster number
$SenderName = $rowDeliver['firstName'] . ' ' . $rowDeliver['lastName'];  //fll in sender name

$recipToken = $rowReceiver['accessToken'];


$client = new Services_Twilio($sid, $token);
$url = "https://localhost/MHacks3/Twilio/payment.php?cost=" . $cost . '&deliverId=' . $deliverId . '&access_token=' . $recipToken. 
		'&taskId=' . $task_Id;
$client->account->messages->sendMessage("19788199169", $recipientNumber, "your task is being performed by " . $SenderName . ".Please visit " . $url . " to confirm payment");


?>



