<?php
require("header.php");
session_start();
Session_Status(3);
if(!isset($_GET["Tkt_Code"]))
{$Message=$Illegal_Actn;}
else
{ 
 $connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
 $result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
 $query="select * from Ticket where Tkt_Code=\"".$_GET["Tkt_Code"]."\";";
 $row=mysql_fetch_array(mysql_query($query));
 $query="select * from Usr where ID=\"".$row["ID"]."\";";
 $row2=mysql_fetch_array(mysql_query($query));
 $Expenses=$row2["Expenses"];
 $query="select PPS from Halls natural join Ticket where Tkt_Code=\"".$_GET["Tkt_Code"]."\";";
 $row2=mysql_fetch_array(mysql_query($query));
 $Price=$row2["PPS"]*$row["Tkt_Sts"];
 $Expenses+=$Price;
 if($Expenses>1500 && $Price>100)
 {
  $Price-=100;
  $Expenses-=1500;
 }
 $query="update Usr set Expenses=".$Expenses." where ID=\"".$row["ID"]."\";";
 mysql_query($query);
 $Message=$row["Tkt_Sts"]." for ".$row["Slot_Code"]." at ".$Price.".";
 $query="delete from Ticket where Tkt_Code=\"".$_GET["Tkt_Code"]."\";";
 mysql_query($query);
 mysql_close($connection);
}
session_register("Message");
$url="Location: Ticketer.php?".session_name()."=".strip_tags(session_id());
header($url);
?>
