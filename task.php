<?php

require_once 'head.php';

if(isset($_GET['taskId']))
{
	$taskId = $_GET['taskId'];
}
else
{
	header('Location: listings.php');
	die();
}



$taskResult = mysql_query("SELECT * FROM posts WHERE taskId='$taskId'") or die("error");


$taskRow = mysql_fetch_assoc($taskResult);

$title = $taskRow['Title'];
$description = $taskRow['description'];
$price = $taskRow['price'];
$neededWhen = $taskRow['neededWhen'];
$posterId = $taskRow['posterId'];
$takenStatus = $takenStatus['takenStatus'];

echo "<h2>". $title . "</h2><br />";



echo "<h6>Needed When:" . $neededWhen . "</h6><br />";

echo "<p>". $description. "</p><br />";

if($takenStatus)
{
	echo "<h6>This Job is already taken</h6><br />";
}
else
{
	echo "<h6><a href='Twilio/message.php?taskId=$taskId'>Take This Job</a></h6><br />";
}


?>