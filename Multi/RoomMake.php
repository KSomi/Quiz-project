<?php
ini_set('display_errors',"1");
error_reporting(E_ALL);
include "../dbConnect.php";

$user_id = $_SESSION['user_id'];
$room_name = $_POST['room_name'];
$max_ppl = $_POST['max_ppl'];

$sql = "INSERT INTO room(Rname, max_ppl, Person_1, Person_2, Person_3, Person_4, ppl_inroom) VALUES('{$room_name}','{$max_ppl}','{$user_id}','empty', 'empty', 'empty', '1')";

if($dbConnect->query($sql)){
	$sql = "SELECT Num_Room FROM room WHERE Rname='$room_name' and max_ppl = '$max_ppl' and Person_1 = '$user_id'";
	$res = $dbConnect->query($sql);
	$row = mysqli_fetch_assoc($res);
	$num_room = $row['Num_Room'];
  echo "<script>alert(\"방 만들기 완료\");</script>";
  echo("<script>location.href='Room.html?num_room=$num_room';</script>");
}
else {
  echo "<script>alert(\"방 만들기 실패\");</script>";
  echo("<script>location.href='../Home-LI.html';</script>");
}


?>