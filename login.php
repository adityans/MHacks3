<?php

require_once 'head.php';

if(isset($_SESSION['userId']))
{
	header('Location: listings.php');
	die();
}
else
{
	header("Location: https://api.venmo.com/v1/oauth/authorize?client_id=1552&scope=make_payments%20access_profile%20access_email%20access_phone%20access_balance&response_type=code");
}


?>
