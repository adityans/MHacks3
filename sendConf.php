<?php

$recipient = "adityans@umich.edu";
$subject = "taskwal confirmation";
$message = "This is a test email";
$header = "From: auto-confirm@localhost.com\r\n"
$header .= "Reply-to: adityans@umich.edu\r\n"; 

mail($recipient, $subject, $message, $header);

?>