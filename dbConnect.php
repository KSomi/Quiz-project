<?php
$host = 'localhost';
$user = 'root';
$pw = 'root';
$dbName = 'Quiz';

$dbConnect = new mysqli($host, $user, $pw, $dbName);
mysqli_set_charset($dbConnect, "utf8");

?>
