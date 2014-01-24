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

<?php

$id = $_GET['transaction_id'];
$number = $_GET['phoneNumber'];
$name = $_GET['name'];

$fullName = urldecode($name);


<<<<<<< HEAD

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
          <li class="header-link"><a href="index.html">Sign Out</a></li>
        </ul>
       <h3 class="text-muted"><a href="index.html">taskwal</a></h3>
   </div>

<?php

=======
>>>>>>> bd66c1b2fde331cc3bfdf6aadf0e6e2d022d108d
$id = $_GET['transaction_id'];
$number = $_GET['phoneNumber'];
$name = $_GET['name'];

$fullName = urldecode($name);

$SenderName = echo "thank you for performing this task for " . $name . ".Their number is " . $rowPoster['phoneNumber'] . " if you need to contact them";

?>

