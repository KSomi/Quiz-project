<?php
	include "../dbConnect.php";
	
	$user_id = $_SESSION['user_id'];
    $num_room = $_SESSION['num_room'];
	$sql = "SELECT * FROM room WHERE Num_Room='$num_room'";
	$res = $dbConnect->query($sql);
	$row = mysqli_fetch_assoc($res);
	$person_1 = $row['Person_1'];
	$person_2 = $row['Person_2'];
	$person_3 = $row['Person_3'];
	$person_4 = $row['Person_4'];
	$ppl_inroom = $row['ppl_inroom'];
	$c_pir = $ppl_inroom -1;
	
	if($user_id == $person_1){
		$sql = "DELETE FROM room WHERE Num_Room = '$num_room'";
		$dbConnect->query($sql);
		echo "Good bye";
		echo("<script>location.href='RoomList.html';</script>");
	} else if($user_id == $person_2){
		$sql = "UPDATE room SET Person_2='empty', ppl_inroom='$c_pir' WHERE Num_Room = '$num_room'";
		$dbConnect->query($sql);
		echo("<script>location.href='RoomList.html';</script>");
	} else if($user_id == $person_3) {
		$sql = "UPDATE room SET Person_3='empty', ppl_inroom='$c_pir' WHERE Num_Room = '$num_room'";
		$dbConnect->query($sql);
		echo("<script>location.href='RoomList.html';</script>");
	} else if($user_id == $person_4) {
		$sql = "UPDATE room SET Person_4='empty', ppl_inroom='$c_pir' WHERE Num_Room = '$num_room'";
		$dbConnect->query($sql);
		echo("<script>location.href='RoomList.html';</script>");
	}
?>