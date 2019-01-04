<?php
          include "dbConnect.php";
          

          $user_id = $_SESSION['user_id'];
		  $user_sql = "SELECT * FROM user WHERE id='$user_id'";
		  $user_res = $dbConnect->query($user_sql);
		  $user_row = mysqli_fetch_assoc($user_res);
		  $user_Avatar = [$user_row['A_background'],$user_row['A_eye'],$user_row['A_mouse'],
		  $user_row['A_cloth'],$user_row['A_hat'],$user_row['A_hand']];
		  $user_HighR = $user_row['HighR'];
		  $user_WeekR = $user_row['WeekR'];
		  

          $sql = "SELECT count(*) as OXNum FROM problem_ox";
          $res = $dbConnect->query($sql);
          $row = mysqli_fetch_assoc($res);
          $Probnum = $row['OXNum'];
          
          $numbers = range(1, $Probnum);
          shuffle($numbers);
         
          $Prow = new SplFixedArray($Probnum);
          for ($i = 0; $i < $Probnum; $i++){
            
            $Psql = "SELECT * FROM problem_ox WHERE Num_ox = '$numbers[$i]'";
            $Pres = $dbConnect->query($Psql);
            $Prow[$i] = mysqli_fetch_array($Pres);
          }
          
          
    ?>