<?php

require_once 'head.php';

//if(isset($_SESSION['userId']))
//{
//	header('Location: listings.php');
//	die();
//}


header("Location: https://api.venmo.com/v1/oauth/authorize?client_id=1552&scope=make_payments%20access_profile");


?>
