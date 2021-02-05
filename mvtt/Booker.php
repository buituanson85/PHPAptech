<?php
require("header.php");
session_start();
Session_Status(4);
$connection=mysql_connect($MySQL_Host,$MySQL_User,$MySQL_PassWord) or die($Error_MySQL_Server);
$result=mysql_select_db($MySQL_DataBase) or die($Error_MySQL_DataBase);
$Hall_Code=$_POST["Hall_Code"];
$Slot_Code=$_POST["Slot_Code"];
$query="select * from Rmndr where Hall_Code=\"$Hall_Code\" and Slot_Code=\"$Slot_Code\";";
$result=mysql_query($query);
if(!mysql_num_rows($result))
{
 $Message=$Illegal_Actn;
 session_register("Message");
 $url="Location: Usr_Home.php?".session_name."=".strip_tags(session_id());
 mysql_close($connection);
 header($url);
}
$query="select * from Hall where Hall_Code=\"$Hall_Code\";";
$row=mysql_fetch_array(mysql_query($query));
$query="select * from Movie natural join Slot where Hall_Code=\"$Hall_Code\" and Slot_Code=\"$Slot_Code\";";
$row2=mysql_fetch_array(mysql_query($query));
?>
<html>
<head>
<meta http-equiv="refresh" content=30>
<?php
print("<title>Please Book your ticket for ".$row2["Movie_Name"]." playing at ".$row["Hall_Name"]." at time ".$row2["Slot_Time"].".</title>");
?>
</head>
<body>
<h1>Available Dates & Seats for Chosen Slot : </h1>
<table border=2>
<tr><th><h2>Slot Date</h2></th><th><h2>No of Seats</h2></th><th><h2>Reserve</h2></th></tr>
<?php
while($row=mysql_fetch_array($result))
{
 print("<tr><td>".$row["Date"]."</td>");
 print("<form action=\"BookIt.php\" method=\"POST\">");
 $k=$row["Rmndr_Sts"]>10?10:$row["Rmndr_Sts"];
 print("<td><select name=\"Tkt_Sts\">");
 if(!$k)
 {print(" disabled");}
 for($i=1;$i<=$k;$i++)
 {print("<option>".$i."</option>");}
 print("</select></td>");
 print("<input type=\"hidden\" name=\"Hall_Code\" value=\"".$Hall_Code."\">");
 print("<input type=\"hidden\" name=\"Slot_Code\" value=\"".$Slot_Code."\">");
 print("<input type=\"hidden\" name=\"Date\" value=\"".$row["Date"]."\">");
 print("<td><button type=\"submit\"");
 if(!$k)
 {print(" disabled");}
 print(">Book Now</button></td>");
 print("</form></tr>");
}
?>
</table>
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
