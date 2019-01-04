<?php
     require_once('../dbConnect_2.php');
     
     
     $sql = "SELECT *, date_format(chatdate,'%r') as cdt from chat order by Num_Chat desc limit 200";
     $sql = "SELECT * FROM (" . $sql . ") as ch order by Num_Chat";
     $result = $dbConnect->query($sql) or die('Query failed: ' . mysql_error());
     
     // Update Row Information
     $msg="<table border='0' style='font-size: 10pt; color: blue; font-family: verdana, arial;'>";
     while ($line = mysqli_fetch_array($result))
     {
           $msg = $msg . "<tr><td>" . $line["cdt"] . "&nbsp;</td>" .
                "<td>" . $line["Username"] . ":&nbsp;</td>" .
                "<td>" . $line["Msg"] . "</td></tr>";
     }
     $msg=$msg . "</table>";
     
     echo $msg;
?>