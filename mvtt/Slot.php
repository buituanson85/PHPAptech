<?php
require("header.php");
session_start();
Session_Status(4);
$Oprtn=$_POST["Oprtn"];
$Hall_Code=$_POST["Hall_Code"];
if(!$Oprtn)
{$Error_Flag=1;}
if(isset($Error_Flag))
{ 
 $Message=$Illegal_Actn;
 session_register("Message");
 $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
 header($url);
}
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$query="select Hall_Name from Hall where Hall_Code=\"".$Hall_Code."\";";
$row=mysql_fetch_array(mysql_query($query));
$Hall_Name=$row["Hall_Name"];
$query="select * from Slot where Hall_Code=\"".$Hall_Code."\";";
if(!mysql_num_rows(mysql_query($query)))
{
 $Message="No Slots set up for ".$Hall_Name.".";
 session_register("Message");
 $url="Location: ReDirect.php?".session_name()."=".strip_tags(session_id());
 mysql_close($connection);
 header($url);
}
if($Oprtn==1)
{
 if($DoW>=5)
 {$DoM-=($DoW-5);}
 else
 {$DoM-=($DoW+2);}
 $TS=mktime(0,0,0,date("m"),$DoM);
}
else
{
 $DoM+=(5-$DoW);
 $TS=mktime(0,0,0,date("m"),$DoM);
}
$Date=date("Y-m-d",$TS);
?>
<html>
<head>
<meta http-equiv="refresh" content=180>
<?php
print("<title>Slots for $Hall_Name for the week beginning $Date.</title>");
?>
<head>
<body>
<?php
$num=1;
$query="select * from Hall where Hall_Code=\"".$Hall_Code."\";";
$row=mysql_fetch_array(mysql_query($query));
$Hall_Name=$row["Hall_Name"];
$query="select * from Halls where Hall_Code=\"".$Hall_Code."\" order by Code;";
$result=mysql_query($query);
while($row=mysql_fetch_array($result))
{
 print("<h2>".$Hall_Name);
 if(mysql_num_rows($result)>1)
 print(" (".$num.")");
 print(" (Rs. ".$row["PPS"]." /Seat)");
 print("</h2><table border=2>");
 if($Oprtn==1)
 {$query="select * from Slot where Hall_Code=\"$Hall_Code\" and Slot_Code like \"".$row["Code"]."%\" and Slot_Date<=\"$Today\" order by Slot_Time;";}
 else
 {$query="select * from Slot where Hall_Code=\"$Hall_Code\" and Slot_Code like \"".$row["Code"]."%\" and Slot_Date>\"$Today\" order by Slot_Time;";}
 $result2=mysql_query($query);
 if(mysql_num_rows($result2))
 {
  print("<tr><th><h3>Movie Name</h3></th><th><h3>Slot Week Date</h3></th><th><h3>Slot Time</h3></th><th><h3>Book Now</h3></th></tr>");
  while($row2=mysql_fetch_array($result2))
  {
   $query="select * from Movie where Movie_Code=\"".$row2["Movie_Code"]."\"";
   $row3=mysql_fetch_array(mysql_query($query));
   print("<tr><td>".$row3["Movie_Name"]."</td>");
   print("<td>".$row2["Slot_Date"]."</td>");
   print("<td>".$row2["Slot_Time"]."</td>");
   print("<form action=\"Booker.php\" method=\"POST\">");
   print("<input type=\"hidden\" name=\"Hall_Code\" value=\"$Hall_Code\">");
   print("<input type=\"hidden\" name=\"Slot_Code\" value=\"".$row2["Slot_Code"]."\">");
   $query="select * from Rmndr where Hall_Code=\"$Hall_Code\" and Slot_Code=\"".$row2["Slot_Code"]."\" and Rmndr_sts>0;";
   print("<td><button type=\"submit\"");
   if(!mysql_num_rows(mysql_query($query)))
   {print(" disabled");}
   print(">Book Now</button></td></form></tr>");
  }
 }
 else
 {print("<tr><td><h4>No Slots set up for the Hall.</h4></td></tr>");}
 $num++;
 print("</table>");
}  
?>
<br><table border=2>
<tr><td><h4>View Location Choices for </h4></td>
<form action="Location.php" method="POST">
<td><select name="City_Code">
<?php
$result=mysql_query($City_query);
while($row=mysql_fetch_array($result))
{
 print("<option value=\"".$row["City_Code"]."\"");
 if($row["City_Code"]==$_SESSION["City_Code"])
 {print(" selected ");}
 print(">".$row["City_Name"]."</option>");
}
?>
</select></td>
<td><button type="submit" name="Oprtn" value=2>View Now</button></td>
</form></tr>
<tr><td><h4>View Category Choices for </h4></td>
<form action="Category.php" method="POST">
<td><select name="Lang_Code">
<?php
$result=mysql_query($Language_query);
while($row=mysql_fetch_array($result))
{
 print("<option value=\"".$row["Lang_Code"]."\"");
 if($row["Lang_Code"]==$_SESSION["Lang_Code"])
 {print(" selected ");}
 print(">".$row["Lang_Name"]."</option>");
}
mysql_close($connection);
?>
</select></td>
<td><button type="submit" name="Oprtn" value=3>View Now</button></td>
</form></tr>
</table>
<br><a href="Usr_Home.php"><button>Back to home page.</button></a>
</body>
</html>
