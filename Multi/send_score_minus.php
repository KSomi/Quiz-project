<?php
include "../dbConnect.php";
$id = $_GET['id'];
$num_room = $_SESSION['num_room'];

if ($id == 1){
	$sql = "UPDATE room SET score_1 = score_1-50 WHERE Num_Room = '$num_room'";
	mysqli_query($dbConnect, $sql);
} else if ($id == 2){
	$sql = "UPDATE room SET score_2 = score_2-50 WHERE Num_Room = '$num_room'";
	mysqli_query($dbConnect, $sql);
} else if ($id == 3) {
	$sql = "UPDATE room SET score_3 = score_3-50 WHERE Num_Room = '$num_room'";
	mysqli_query($dbConnect, $sql);
} else if ($id == 4) {
	$sql = "UPDATE room SET score_4 = score_4-50 WHERE Num_Room = '$num_room'";
	mysqli_query($dbConnect, $sql);
}



?>