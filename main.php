<?php

require_once "venmo.php";
require("head.php");

$token = $_REQUEST['access_token'];
echo ($token);
session_start();
$_SESSION['token'] = $token;


$dev = new Venmo;
$userData = $dev->getUserData($token);
$data = json_decode($userData, true);

echo "welcome " . $data['data']['user']['username'];

header("Location: test.php");










?>