<?php
require("header.php");
session_start();
Session_Status(4);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$query="select * from Ticket where ID=\"".$_SESSION["ID"]."\" and Hall_Code=\"".$_POST["Hall_Code"]."\" and Slot_Code=\"".$_POST["Slot_Code"]."\" and Date=\"".$_POST["Date"]."\";";
if(!isset($_POST["Hall_Code"]) && !isset($_POST["Slot_Code"]))
{$Message=$Illegal_Actn;}
elseif(mysql_num_rows(mysql_query($query)))
{
 $row=mysql_fetch_array(mysql_query($query));
 $Message=$row["Tkt_Sts"]." seats already booked for this show by you with Ticket Code ".$row["Tkt_Code"].". Please cancel the ticket or choose another slot.";
}
else
{
 $k=50;
 $limit=999;
 do
 {
  $i=0;
  do
  {
   $Code=Gnrt0s_str(mt_rand(0,$limit),9,"T");
   $query="insert into Ticket(Tkt_Code,ID,Hall_Code,Slot_Code,Date,Tkt_Sts) values(\"".$Code."\",\"".$_SESSION["ID"]."\",\"".$_POST["Hall_Code"]."\",\"".$_POST["Slot_Code"]."\",\"".$_POST["Date"]."\",".$_POST["Tkt_Sts"].");";
   $result=mysql_query($query);
   $i++;
  }
  while(!$result && $i<=$k);
  $k*=2;
  $limit*=100;
  $limit+=99;
 }
 while(!$result && $k<=400);
 if($result)
 {
  $query="select * from Rmndr where Hall_Code=\"".$_POST["Hall_Code"]."\" and Slot_Code=\"".$_POST["Slot_Code"]."\" and  Date=\"".$_POST["Date"]."\";";
  $row=mysql_fetch_array(mysql_query($query));
  $Sts=$row["Rmndr_Sts"]-$_POST["Tkt_Sts"];
  $query="update Rmndr set Rmndr_Sts=".$Sts." where Hall_Code=\"".$_POST["Hall_Code"]."\" and Slot_Code=\"".$_POST["Slot_Code"]."\" and  Date=\"".$_POST["Date"]."\";";
  mysql_query($query);
  $Message="Ticket Booked with Code ".$Code.".Please verify.";
 }
 else
 {$Message="Ticket Booking failed.Please try again.";}
} 
mysql_close($connection);
session_register("Message");
$url="Location: Usr_Home.php?".session_name()."=".strip_tags(session_id());
header($url);
?>
