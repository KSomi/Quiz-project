<?php
          include "dbConnect.php";
          
		  $user_id = $_SESSION['user_id'];

		  $sql = "SELECT * FROM user WHERE ID='{$user_id}'";
          $res = $dbConnect->query($sql);
          $row = mysqli_fetch_array($res);
          
          $High_rec = $row['HighR'];
          $Week_rec = $row['WeekR'];
		  
		  
          
		  if (isset($_GET['rscore'])){
			$user_RScore = $_GET['rscore'];
			if($user_RScore > $High_rec){
				$HRsql = "UPDATE user SET HighR='{$user_RScore}' WHERE id='{$user_id}'";
				$dbConnect->query($HRsql);
			}
			if($user_RScore > $Week_rec){
				$WRsql = "UPDATE user SET WeekR='{$user_RScore}' WHERE id='{$user_id}'";
				$dbConnect->query($WRsql);
			}
		  }
		  	  
          if (isset($_GET['BG'])){
			  $user_BG = $_GET['BG'];
			  $sql = "UPDATE user SET A_background='{$user_BG}' WHERE id='{$user_id}'";
			  $dbConnect->query($sql);
		  }
		  if (isset($_GET['eyes'])){
			  $user_eye = $_GET['eyes'];
			  $sql = "UPDATE user SET A_eye='{$user_eye}' WHERE id='{$user_id}'";
			  $dbConnect->query($sql);
		  }
		  if (isset($_GET['mouth'])){
			  $user_mouth = $_GET['mouth'];
			  $sql = "UPDATE user SET A_mouse='{$user_mouth}' WHERE id='{$user_id}'";
			  $dbConnect->query($sql);
		  }
		  if (isset($_GET['cloth'])){
			  $user_cloth = $_GET['cloth'];
			  $sql = "UPDATE user SET A_cloth='{$user_cloth}' WHERE id='{$user_id}'";
			  $dbConnect->query($sql);
		  }
		  if (isset($_GET['hat'])){
			  $user_hat = $_GET['hat'];
			  $sql = "UPDATE user SET A_hat='{$user_hat}' WHERE id='{$user_id}'";
			  $dbConnect->query($sql);
		  }
		  if (isset($_GET['hand'])){
			  $user_hand = $_GET['hand'];
			  $sql = "UPDATE user SET A_hand='{$user_hand}' WHERE id='{$user_id}'";
			  $dbConnect->query($sql);
		  }
		  
		  
          $rankSQL = "SELECT id, weekr FROM user ORDER BY weekr DESC";
          $rankRES = $dbConnect->query($rankSQL);
          $rank_ppl = array();
          for($i = 0; $i<3; $i++){
            $rankROW = mysqli_fetch_array($rankRES);
            array_push($rank_ppl, $rankROW['id']);
          }
?>