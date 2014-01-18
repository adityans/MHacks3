<?php

require_once "venmo.php";

$token = $_REQUEST['access_token'];

$dev = new Venmo;
$userData = $dev->getUserData($token);
$data = json_decode($userData, true);

echo "welcome " . $data['data']['user']['username'];

echo "making payment to Karan Vishwanathan";

$pay = $dev->makePayment($token, '248', 'test', '0.01');
print_r($pay);











?>