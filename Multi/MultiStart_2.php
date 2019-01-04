<?php
	include "../dbConnect.php";
	$num_room = $_SESSION['num_room'];
	
	$sql = "SELECT * FROM room WHERE Num_Room = '{$num_room}'";
	$res = $dbConnect->query($sql);
	$row = mysqli_fetch_assoc($res);
	
	$score = [$row['score_1'], $row['score_2'], $row['score_3'], $row['score_4']];
	echo json_encode($score);
?>