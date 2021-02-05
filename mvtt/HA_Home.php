<?php
require("header.php");
session_start();
Session_Status(2);
if($DoW!=3 && $DoW!=4)
{
 $Temp="Current";
 if($DoW>=5)
 {$Rmndr_Days=7-($DoW-5);}
 else
 {$Rmndr_Days=5-$DoW;}
}
else
{
 $Temp="Next";
 $DoM+=(5-$DoW); 
 $Rmndr_Days=7;
}
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$query="select * from Halls where Hall_Code=\"".$_SESSION["ID"]."\" order by Code;";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
 $queryk="select * from Test where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$row["Code"]."%\";";
 $result2=mysql_query($queryk);
 $query="insert into Slot(";
 for($i=1;$row2=mysql_fetch_field($result2);$i++)
 {
  $query.=$row2->name;
  if($i!=mysql_num_fields($result2))
  {$query.=",";}
  else
  {$query.=") values(";}
 }
 $result2=mysql_query($queryk);
 while($row2=mysql_fetch_array($result2))
 {
  $query2=$query;
  $resultk=mysql_query($queryk);
  for($i=1;$row3=mysql_fetch_field($resultk);$i++)
  {
   if($row3->numeric)
   {$query2.=$row2[$row3->name];}
   else
   {$query2.="\"".$row2[$row3->name]."\"";}
   if($i!=mysql_num_fields($resultk))
   {$query2.=",";}
   else
   {$query2.=");";}
  }
  mysql_query($query2);
 }
 $result2=mysql_query($queryk);
 $query="insert into Rmndr(Hall_Code,Slot_Code,Date,Rmndr_Sts) values (";
 while($row2=mysql_fetch_array($result2))
 {
  for($i=0,$DoS=$DoM;$i<$Rmndr_Days;$i++,$DoS++)
  {
   $TS=mktime(0,0,0,substr($Today,5,2),$DoS);
   $Date=date("Y-m-d",$TS);
   $query2=$query."\"".$_SESSION["ID"]."\",\"".$row2["Slot_Code"]."\",\"".$Date."\",".$row["Sts_Avlbl"].");";
   mysql_query($query2);
  }
 }
 $query="delete from Test where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$row["Code"]."%\";";
 mysql_query($query);
}
?>
<html>
<head>
<meta http-equiv="refresh" content=180>
<?php
$query="select * from Hall where Hall_Code=\"".strtoupper($_SESSION["ID"])."\";";
$row=mysql_fetch_array(mysql_query($query));
print("<title>Hall Administrator Home Page for ".$row["Hall_Name"].".</title>");
?>
</head>
<body bgcolor="lightgoldenrodyellow" text="maroon">
<?php
if(session_is_registered("Error"))
{
 print("<h3>".$_SESSION["Error"]."</h3>");
 session_unregister("Error");
}
if(session_is_registered("Message"))
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
?>
<form action="HA_Perform.php" method="POST">
<div align="center"><b><u>Hall Administrator Task Form</u></b>
</div><br><br><br><div align="center">
<table bgcolor="Lightskyblue" text="Navy">
<tr><td><b>
<?php
$query="select * from Halls where Hall_Code=\"".$_SESSION["ID"]."\";";
$result=mysql_query($query);
$Set=TRUE;
while($row=mysql_fetch_array($result))
{
 $query2="select * from Slot where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$row["Code"]."%\";";
 $result2=mysql_query($query2);
 $Set=(mysql_num_rows($result2) && $Set); 
 if(!$Set)
 {break;}
}
print("<input type=\"radio\" name=\"Choice\" value=0");
if(mysql_num_rows($result)==10 && $Set)
{print(" disabled");}
print(">");
if(!mysql_num_rows($result))
{print("Set Up Halls");}
else
{print("Change Hall Settings");}
?>
</b></td></tr>
<tr><td><b>
<?php
$Set=TRUE;
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
 if($DoW!=3 && $DoW!=4)
 {
  $query2="select * from Slot where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$row["Code"]."%\" and Slot_Date<=\"".$Today."\";";
 }
 else
 {
  $query2="select * from Slot where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$row["Code"]."%\" and Slot_Date>\"".$Today."\";";
 }
 $result2=mysql_query($query2);
 $Set=(mysql_num_rows($result2) && $Set); 
 if(!$Set)
 {break;}
}
print("<input type=\"radio\" name=\"Choice\" value=1");
if(!mysql_num_rows($result) || $Set)
{print(" disabled");}
print(">");
print("Set Up ".$Temp." Week Slots");
mysql_close($connection);
?>
</b></td></tr>
<tr><td><b><input type="radio" name="Choice" value=2 checked><b>Change Passwords</b></td></tr>
<tr><td colspan=5 bgcolor="mistyrose" text="maroon">
<center><button type="submit" name="Oprtn" value=1>Continue</button></center></td></tr>
<tr><td colspan=5 bgcolor="mistyrose" text="maroon">
<center><button type="submit" name="Oprtn" value=0>Log Out</button></center ></td></tr>
</table></div>
</form></body>
</html>
