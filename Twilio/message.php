<?php
require_once('/Services/Twilio.php');
$sid = "AC47de053c49c1997a0219339dd2ef4a63";
$token = "9db18cc7814409c5f236341fb9e5fd17";

$recipientNumber = "" //fill in with poster number
$SenderName = "" //fll in sender name




$client = new Services_Twilio($sid, $token);

$client->account->messages->sendMessage("19788199169", "12487606405", "your task is being performed by " . $SenderName);