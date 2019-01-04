<?php
	include "../dbConnect.php";
	
	$num_room = $_GET['num_room'];
	$user_id = $_SESSION['user_id'];
	
	$sql = "SELECT * FROM room WHERE Num_Room = '{$num_room}'";
	$res = $dbConnect->query($sql);
	$row = mysqli_fetch_assoc($res);
	
	$ppl_inroom = $row['ppl_inroom'];
	$user_1 = $row['Person_1'];
	$user_2 = $row['Person_2'];
	$user_3 = $row['Person_3'];
	$user_4 = $row['Person_4'];

	$user_sql = "SELECT * FROM user WHERE id='$user_1'";
	$user_res = $dbConnect->query($user_sql);
	$user_row = mysqli_fetch_assoc($user_res);
	$user_Avatar_1 = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
	$user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand']];
		  
	$user_Avatar_2 = 0;
	$user_Avatar_3 = 0;
	$user_Avatar_4 = 0;
		  
	if($user_2!='empty'){
		$user_sql = "SELECT * FROM user WHERE id='$user_2'";
		$user_res = $dbConnect->query($user_sql);
		$user_row = mysqli_fetch_assoc($user_res);
		$user_Avatar_2 = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
		$user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand']];
	}
	if($user_3!='empty'){
		$user_sql = "SELECT * FROM user WHERE id='$user_3'";
		$user_res = $dbConnect->query($user_sql);
		$user_row = mysqli_fetch_assoc($user_res);
		$user_Avatar_3 = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
		$user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand']];
			  
	}
	if($user_4!='empty'){
		$user_sql = "SELECT * FROM user WHERE id='$user_4'";
		$user_res = $dbConnect->query($user_sql);
		$user_row = mysqli_fetch_assoc($user_res);
		$user_Avatar_4 = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
		$user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand']];
	}
	
	$sql = "SELECT ProbNum FROM room WHERE Num_Room='$num_room'";
	$res = $dbConnect->query($sql);
	$row = mysqli_fetch_assoc($res);
	$numbers = unserialize($row['ProbNum']);
	
	$sql = "SELECT count(*) as OXNum FROM problem_ox";
	$res = $dbConnect->query($sql);
	$row = mysqli_fetch_assoc($res);
	$Probnum = $row['OXNum'];
         
    $Prow = new SplFixedArray($Probnum);
    for ($i = 0; $i < $Probnum; $i++){
            
    $Psql = "SELECT * FROM problem_ox WHERE Num_ox = '$numbers[$i]'";
    $Pres = $dbConnect->query($Psql);
    $Prow[$i] = mysqli_fetch_array($Pres);
    }

		  

?>