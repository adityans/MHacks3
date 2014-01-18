<?php

require_once 'functions.php';

$dbhost = 'localhost';
$dbname = 'taskwal';
$dbuser = 'root';
$dbpass = '';

mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());

mysql_select_db($dbname) or die(mysql_error());

session_start();




?>
