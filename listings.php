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
  <li class="header-link"><a href="postJob.php">Post a Task</a></li>
</ul>

<?php

require_once 'head.php';

if(!isset($_SESSION['userId']))
{
	header('Location: index.html');
}


$firstName = $_SESSION['firstName'];

echo "<h2>Welcome,  <small class='firstName'>" . $firstName . "</small> </h2>";

?>

<div class="jumbotron listings">
	<?php
        echo "<h1 class='postingheading'>Postings</h1>";

        $school = $_SESSION['school'];

		$result = mysql_query("SELECT * FROM posts WHERE school='$school' ORDER BY timeEntered DESC");

		$numEntries = mysql_num_rows($result);

		while($numEntries > 0)
		  {
		  	$row = mysql_fetch_assoc($result);
			$taskId = $row['taskId'];
		  	echo "<div class='tasklinks'><a href='task.php?taskId=$taskId'>". $row['Title'] . "</a></div>";
		  	$numEntries--;
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
