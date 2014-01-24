<?php

echo "mail script";

$to = "adityans@umich.edu";
$subject = "Test mail";
$message = "This is a test email"
$from = "support@taskwal-playnow.rhcloud.com/";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

echo "mail sent";

?>