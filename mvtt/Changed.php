<?php
require("header.php");
session_start();
Session_Status(4);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
if(!isset($_POST["Tkt_Code"]))
{$Message=$Illegal_Actn;}
else
{ 
 $query="select * from Rmndr natural join Ticket where Tkt_Code=\"".$_POST["Tkt_Code"]."\";";
 $row=mysql_fetch_array(mysql_query($query));
 $Sts=$row["Rmndr_Sts"]+$row["Tkt_Sts"]-$_POST["Tkt_Sts"];
 $query="update Rmndr set Rmndr_Sts=".$Sts." where Hall_Code=\"".$row["Hall_Code"]."\" and Slot_Code=\"".$row["Slot_Code"]."\" and  Date=\"".$row["Date"]."\";";
 $result=mysql_query($query);
 if($_POST["Tkt_Sts"])
 {$update_query="update Ticket set Tkt_Sts=".$_POST["Tkt_Sts"]." where Tkt_Code=\"".$_POST["Tkt_Code"]."\";";}
 else
 {$update_query="delete from Ticket where Tkt_Code=\"".$_POST["Tkt_Code"]."\";";}
 mysql_query($update_query);
 if($result && $_POST["Tkt_Sts"])
 {$Message="Ticket Updated.";}
 elseif(!$_POST["Tkt_Sts"])
 {$Message="Ticket Cancelled.";}
 else
 {$Message="Ticket Updation Failed.";}
}
mysql_close($connection);
session_register("Message");
$url="Location: Change.php?".session_name()."=".strip_tags(session_id());
header($url);
?>
