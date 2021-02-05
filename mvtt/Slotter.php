<?php
require("header.php");
session_start();
Session_Status(2);
if($DoW==3 || $DoW==4)
{$DoM+=(5-$DoW);}
elseif($DoW>=5)
{$DoM-=($DoW-5);}
else
{$DoM-=(2+$DoW);}
$TS=mktime(0,0,0,strftime("%m"),$DoM);
$Date=date("Y-m-d",$TS);
if(!isset($_POST["Code"]) && !isset($_GET["Code"]))
{
 $Message=$Illegal_Actn;
 session_register("Message");
 $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
 header($url);
}
elseif(isset($_POST["Code"]))
{$Code=$_POST["Code"];}
else
{$Code=$_GET["Code"];}
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$query="select * from Hall where Hall_Code=\"".$_SESSION["ID"]."\"";
$row=mysql_fetch_array(mysql_query($query));
$Title="Slot Scheduling for ".$row["Hall_Name"].".";
switch($_POST["Oprtn"])
{
 case 1:
 {
  $Time="09:00";
  break;
 }  
 case 2:
 {
  $Movie_Code=$_POST["Movie_Code"];
  $query="select * from Slot where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$Code."%\" order by Slot_Code;";
  $result=mysql_query($query);
  for($i=0;$row=mysql_fetch_array($result);$i++)
  {$Test[$i]=substr($row["Slot_Code"],-1,1);}
  $query="select * from Test where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$Code."%\" order by Slot_Code;";
  $result=mysql_query($query);
  for($i=count($Test);$row=mysql_fetch_array($result);$i++)
  {$Test[$i]=substr($row["Slot_Code"],-1,1);}
  if(count($Test))
  {sort($Test);}
  for($i=0;$i<count($Test);$i++)
  {
   $Temp=$Test[$i];
   settype($Temp,"integer");
   if($Temp>$i) 
   {break;}
  }
  $Temp=Gnrt0s_str($i,1,$Code."S",0);
  $query="insert into Test(Hall_Code,Slot_Code,Slot_Date,Slot_Time,Movie_Code) values(\"".$_SESSION["ID"]."\",\"".$Temp."\",\"".$Date."\",\"".$_POST["Time"].":00\",\"".$_POST["Movie_Code"]."\");";
  $result=mysql_query($query);
  $query="select * from Movie where Movie_Code=\"".$Movie_Code."\";";
  $row2=mysql_fetch_array(mysql_query($query));
  settype($Minutes=(substr($_POST["Time"],-2,2)+substr($row2["Duration"],-5,2)),"integer");
  settype($Hours=substr($_POST["Time"],0,2)+substr($row2["Duration"],0,2)+$Minutes/60,"integer");
  $Hours=Gnrt0s_str($Hours,2);
  $Minutes=Gnrt0s_str($Minutes%60,2);
  $Time=$Hours.":".$Minutes;
  break;
 }  
 default:
 {
  if(isset($_GET["Time"]))
  {$Time=$_GET["Time"];}
  else
  {
   $Time="09:00";
   $query="delete from Test where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$Code."%\";";
   mysql_query($query);
  }
  break;
 }
}
?>
<html>
<head><title>
<?php
print($Title);
?>
</title><head>
<body>
<?php
if(session_is_registered("Message"))
{
 print("<h3>".$_SESSION["Message"]."</h3>");
 session_unregister("Message");
}
?>
<h2>Currently Set Up Slots : </h2>
<table border=2>
<?php
$query="select * from Test where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$Code."%\";";
$result=mysql_query($query);
if(mysql_num_rows($result))
{
 print("<tr><th><h3>Movie Name</h3></th><th><h3>Slot Time</h3></th></tr>");
 while($row=mysql_fetch_array($result))
 {
  $query="select * from Movie where Movie_Code=\"".$row["Movie_Code"]."\"";
  $row2=mysql_fetch_array(mysql_query($query));
  print("<tr><td>".$row2["Movie_Name"]."</td>");
  print("<td>".$row["Slot_Time"]."</td></tr>");
 }
}
else
{print("<tr><td>".$No_Entry."</td></tr>");}
?>
</table>
<h2>Add a Slot : </h2>
<table border=2>
<tr><th><h3>Slot Time</h3></th><th><h3>Movie Language</h3></th><th><h3>Choose Movie</h3></th></tr>
<tr><form action="Category.php" method="POST">
<?php
$query="select * from Test where Hall_Code=\"".$_SESSION["ID"]."\" and Slot_Code like \"".$Code."%\";";
$result=mysql_query($query);
print("<input type=\"hidden\" name=\"Code\" value=\"".$Code."\">");
print("<td><select name=\"Time\"");
if(strcmp($Time,"21:30")>0 || mysql_num_rows($result)==5)
{print(" disabled");}
print(">");
for($i=mktime(substr($Time,0,2),substr($Time,-2,2),0);$i<=mktime(21,30,0);$i+=600)
{
 $Time=strftime("%H:%M",$i);
 print("<option>".$Time."</option>");
}
print("</select></td>");
print("<td><select name=\"Lang_Code\"");
if(strcmp($Time,"21:30")>0 || mysql_num_rows($result)==5)
{print(" disabled");}
print(">");
$result=mysql_query($Language_query);
while($row=(mysql_fetch_array($result)))
{
 print("<option value=\"".$row["Lang_Code"]."\">".$row["Lang_Name"]."</option>");
}
print("</select></td>");
print("<td><button type=\"submit\" name=\"Oprtn\" value=2");
if(strcmp($Time,"21:30")>0 || mysql_num_rows($result)==5)
{print(" disabled");}
print(">Choose Movie</button></td></form></tr></table>");
print("<form action=\"".$_SERVER["PHP_SELF"]."\" method=\"POST\">");
print("<button type=\"submit\" name=\"Code\" value=\"".$_POST["Code"]."\">Change Slots</button>");
mysql_close($connection);
?>
</form></tr></table>
<a href="Halls.php"><button type="button">Finished setting Slots</button></a>
</body>
</html>
