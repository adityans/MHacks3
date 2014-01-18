<?php

require_once 'head.php';

$firstName = $_SESSION['firstName'];

echo "<h2>Welcome " . $firstName . "</h2>";


?>

<br /><a href = "logout.php">Log Out</a>