<?php
     require_once('../dbConnect_2.php');
     
     $msg = $_GET["msg"];
     $dt = date("Y-m-d H:i:s");
     $user = $_SESSION["user_id"];
     $sql="INSERT INTO chat(Username,Chatdate,Msg) " .
          "values(" . quote($user) . "," . quote($dt) . "," . quote($msg) . ");";
          echo $sql;
     $result = $dbConnect->query($sql);
     if(!$result)
     {
        throw new Exception('Query failed: ' . mysql_error());
        exit();
     }
?>