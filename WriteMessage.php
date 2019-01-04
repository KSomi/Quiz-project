<?php
include "dbConnect.php";

$sender_id = $_SESSION['user_id'];
$getter_id = $_POST['getter'];
$title = $_POST['title'];
$content = $_POST['content'];


$sql = "SELECT * FROM user WHERE ID = '{$getter_id}'";
$res = $dbConnect->query($sql);
if($res->num_rows == 0||$getter_id==null)
{
  echo "<script>alert(\"받는 사람이 존재하지 않습니다. \");</script>";
  echo("<script>location.href='WriteMsg.html';</script>");
}//아이디 체크

if($title==''||$title==null)
{
  echo "<script>alert(\"제목을 입력해주세요. \");</script>";
  echo("<script>location.href='WriteMsg.html';</script>");
}//제목 체크


$sql = "INSERT INTO message(Sender, Getter, Title, Content) VALUES('{$sender_id}','{$getter_id}','{$title}','{$content}')";

if($dbConnect->query($sql)){
  echo "<script>alert(\"쪽지가 발송되었습니다.\");</script>";
}
else {
  echo "<script>alert(\"쪽지 발송에 실패하였습니다.\");</script>";
}
echo("<script>location.href='Home-LI.html';</script>");

?>