<?php

require_once "venmo.php";

$token = $_REQUEST['access_token'];

$dev = new Venmo;
$userData = $dev->getUserData($token);
$data = json_decode($userData, true);

echo "welcome " . $data['data']['user']['username'];











?>