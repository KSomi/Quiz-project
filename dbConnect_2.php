<?php
$host = 'localhost';
$user = 'root';
$pw = 'root';
$dbName = 'Quiz';

$dbConnect = new mysqli($host, $user, $pw, $dbName);
mysqli_set_charset($dbConnect, "utf8");

function quote($strText)
{
    $Mstr = addslashes($strText);
    return "'" . $Mstr . "'";
}
function isdate($d)
{
   $ret = true;
   try
   {
       $x = date("d",$d);
   }
   catch (Exception $e)
   {
       $ret = false;
   }
   echo $x;
   return $ret;
}


?>
