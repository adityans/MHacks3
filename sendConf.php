<?php

require_once 'unirest-php/lib/Unirest.php';
require_once 'sendgrid-php/lib/SendGrid.php';
SendGrid::register_autoloader();

/*if(isset($_POST['email']) && isset($_POST['schoolChoice']))
{
  extract($_POST);
}
else
{
  header('Location: index.html');
  die();
}*/

extract($_POST);



$sendgrid = new SendGrid('adityans', 'taskwaladmin');
$emailToSend = new SendGrid\Mail();

echo "hi i get here"


echo "hi i get here";

$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$randomString = '';
for ($i = 0; $i < 20; $i++) 
{
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
}

$email = "adityans@umich.edu"
$school = "umich";

$url= "http://taskwal-playnow.rhcloud.com/processEmail.php?regCode=".$randomString."&email=" . $email . "&school=" . $schoolChoice;
$message = "<p>Hello from taskwal, to confirm your registration, please click this " . "<a href='$url'>link</a></p>";*/





$emailToSend->addTo($email)->
       setFrom('support@taskwal.com')->
       setSubject('Confirm taskwal Account')->
       setHtml($message);

$request = $sendgrid->web->send($emailToSend);





/*$insertCode = "INSERT INTO regCodes VALUES ('$email', '$randomString')";

mysql_query($insertCode) or die("error");


//$sendgrid = new SendGrid('adityans', 'taskwaladmin');




$to = "adityans@umich.edu";
$subject = "Test mail";
$message = "<p>Hello from taskwal, to confirm your registration, please click this " . "<a href='$url'>link</a></p>";
$from = "support@taskwal-playnow.rhcloud.com/";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);

/*$mail = new SendGrid\Mail();
$mail->
  addTo($email)->
  setFrom('support@taskwal-playnow.rhcloud.com/')->
  setSubject('taskwal Confirmation')->
  setText('')->
  setHtml($message);

$sendgrid->
web->
  send($mail);*/


echo "<h3>Please check you email for a confirmation url</h3>";

?>