<?php
	include "../dbConnect.php";
	
	$user_id = $_SESSION['user_id'];
    $num_room = $_SESSION['num_room'];
	$sql = "SELECT * FROM room WHERE Num_Room='$num_room'";
	$res = $dbConnect->query($sql);
	$row = mysqli_fetch_assoc($res);
	$person_1 = $row['Person_1'];
	
	if ($user_id==$person_1){
		$sql = "SELECT count(*) as OXNum FROM problem_ox";
		$res = $dbConnect->query($sql);
		$row = mysqli_fetch_assoc($res);
		$Probnum = $row['OXNum'];
          
		$numbers = range(1, $Probnum);
		shuffle($numbers);
		
		$s_arr = serialize($numbers);
		
		$sql = "UPDATE room SET ProbNum='$s_arr' WHERE Num_Room = '$num_room'";
		$dbConnect->query($sql);
		
		$sql = "UPDATE room SET Started=1 WHERE Num_Room = '$num_room'";
		$dbConnect->query($sql);
		
		echo("<script>location.href='MultiStart.html?num_room='+$num_room;</script>");
	} else {
		echo "<script>alert(\"실행 권한이 없습니다.\");</script>";
		echo("<script>location.href='Room.html?num_room='+$num_room;</script>");
	}