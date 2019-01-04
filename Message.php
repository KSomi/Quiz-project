<?php
include "dbConnect.php";
include "session.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM message where Getter='$user_id'";
$res = $dbConnect->query($sql);
$row_MSG = array();

while($row = mysqli_fetch_array($res)){
	array_push($row_MSG, $row);
}



?>