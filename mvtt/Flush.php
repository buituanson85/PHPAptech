<?php
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);

$query="select * from Slot where Slot_Date<\"".$Today."\";";
if(($DoW==5 || ($DoW==4 && $Time>"21:00:00")) && mysql_num_rows(mysql_query($query)))
{
 $query="delete from Slot where Slot_Date<\"".$Today."\";";
 mysql_query($query);
}

settype($Hour=strftime("%H"),"integer");
settype($Minutes=strftime("%M"),"integer");
$Minutes-=($Minutes%10);
$Minutes+=30;
$TS=mktime($Hour,$Minutes,0);
$Time=strftime("%H:%M:%S",$TS);
$query="select * from Rmndr where Date<\"".$Today."\";";
if(mysql_num_rows(mysql_query($query)))
{
 $query="delete from Rmndr where Date<\"".$Today."\";";
 mysql_query($query);
}
$query="select * from Ticket where Date<\"".$Today."\";";
if(mysql_num_rows(mysql_query($query)))
{
 $query="delete from Ticket where Date<\"".$Today."\";";
 mysql_query($query);
}
$query="select * from Slot where Slot_Time<=\"".$Time."\";";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))  
{
 $query="delete from Rmndr where Date=\"".$Today."\" and Slot_Code=\"".$row["Slot_Code"]."\";";
 mysql_query($query);
 $query="delete from Ticket where Date=\"".$Today."\" and Slot_Code=\"".$row["Slot_Code"]."\";";
 mysql_query($query);
}
mysql_close($connection);
?>
