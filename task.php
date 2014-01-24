<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png"> <!-- icon -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

    <title>taskwal</title>

    <!-- Bootstrap core CSS -->
    <link href="FrontEnd/dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="FrontEnd/taskwal.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
 <body>
 	<!--Header -->
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="header-link"><a href="logout.php">Sign Out</a></li>
        </ul>
       <h2 class="text-muted"><a href="listings.php">taskwal</a></h2>
       <h6 class="text-muted text-under">Peersourced Task Completion</h6>
   </div>

	<ul class="nav nav-pills pull-right">
  		<li class="header-link"><a href="listings.php">Return to Listings</a></li>
  	</ul>

<div class="jumbotron listings">
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
$takenStatus = $taskRow['takenStatus'];

echo "<h2 class='title'>". $title . "</h2><br />";

echo "<h2><em class='descriptions'>Date Needed By</em>" . $neededWhen . "</h2><br />";

echo "<h2><em class='descriptions'>Compensation $</em>" . $price . "</h2><br />";

echo "<h4><em class='descriptions'>Description</em>" . $description. "</h4><br />";

if($takenStatus)
{
	echo "<h4 class='takejob'>This Job has already been claimed</h4><br />";
}
else
{
	echo "<h4 class='takejob'><a href='Twilio/message.php?taskId=$taskId'>Take This Job</a></h4><br />";
}

?>
	
</div>

		<div class="footer">
        <ul class="footer-links group">
            <li class="list-item"><a href="/info/product" >About</a></li>
            <li class="list-item"><a href="/info/fees" >Fees & FAQ</a></li>
            <li class="list-item"><a href="/info/about" >Team</a></li>
            <li class="list-item"><a href="/info/press" >Press</a></li>
            <li class="list-item"><a href="/info/jobs" >Jobs</a></li>
            <li class="list-item"><a href="/info/legal" >Legal</a></li>
            <li class="list-item"><a href="https://help.venmo.com" >Help Center</a></li>
            <li class="list-item"><a href="/info/contact" >Contact</a></li>
        </ul>
        <div class="copyright">Copyright &copy; 2014 taskwal Inc. All Rights Reserved</div>
        <div id="social-buttons">       
            <a href="https://twitter.com/taskwal" class="twitter-follow-button" data-show-count="false">Follow @vtaskwal</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
      </div>
    </div> <!-- /container -->
</body>
</html>
