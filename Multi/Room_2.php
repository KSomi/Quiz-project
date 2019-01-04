<?php
          include "../dbConnect.php";
          
		  $num_room = $_GET['num_room'];
		  $_SESSION['num_room'] = $num_room;
		  $user_id = $_SESSION['user_id'];
		  
		  
		  $sql = "SELECT * FROM room WHERE Num_Room='$num_room'";
		  $res = $dbConnect->query($sql);
		  $row = mysqli_fetch_assoc($res);
		  $ppl_inroom = $row['ppl_inroom'];
		  $max_ppl = $row['max_ppl'];
		  $started = $row['Started'];
		  $arr = [$row['Person_1'],$row['Person_2'], $row['Person_3'], $row['Person_4']]; 

		  $sql = "SELECT * FROM room WHERE Num_Room='$num_room'";
		  $res = $dbConnect->query($sql);
		  $row = mysqli_fetch_assoc($res);
		  $user_1 = $arr[0];
		  $user_2 = $arr[1];
		  $user_3 = $arr[2];
		  $user_4 = $arr[3];
		  
		  $user_sql = "SELECT * FROM user WHERE id='$user_1'";
		  $user_res = $dbConnect->query($user_sql);
		  $user_row = mysqli_fetch_assoc($user_res);
		  $user_Avatar_1 = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
		  $user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand'], $user_1, $started];
		  
		  $user_Avatar_2 = 0;
		  $user_Avatar_3 = 0;
		  $user_Avatar_4 = 0;
		  
		  if($row['Person_2']!='empty'){
			  $user_2 = $arr[1];
			  $user_sql = "SELECT * FROM user WHERE id='$user_2'";
			  $user_res = $dbConnect->query($user_sql);
			  $user_row = mysqli_fetch_assoc($user_res);
			  $user_Avatar_2 = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
			  $user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand'], $user_2];
		  }
		  if($row['Person_3']!='empty'){
			  $user_3 = $arr[2];
			  $user_sql = "SELECT * FROM user WHERE id='$user_3'";
			  $user_res = $dbConnect->query($user_sql);
			  $user_row = mysqli_fetch_assoc($user_res);
			  $user_Avatar_3 = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
			  $user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand'], $user_3];
			  
		  }
		  if($row['Person_4']!='empty'){
			  $user_4 = $arr[3];
			  $user_sql = "SELECT * FROM user WHERE id='$user_4'";
			  $user_res = $dbConnect->query($user_sql);
			  $user_row = mysqli_fetch_assoc($user_res);
			  $user_Avatar_4 = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
			  $user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand'], $user_4];
		  }
		  
		  $sql = "SELECT * FROM room WHERE Num_Room='$num_room'";
		  $res = $dbConnect->query($sql);
		  $row = mysqli_fetch_assoc($res);
		  $ppl_inroom = $row['ppl_inroom'];
          
		  $Avat_arr = [$user_Avatar_1, $user_Avatar_2, $user_Avatar_3, $user_Avatar_4]; 
		  echo json_encode($Avat_arr);
          
    ?>